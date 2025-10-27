<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Show the booking form.
     */
    public function index()
    {
        return view('booking.index');
    }

    /**
     * Check availability and show room options.
     */
    public function checkAvailability(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        // Check if any date in the range is fully booked
        if (RoomAvailability::isAnyDateFullyBooked($checkIn, $checkOut)) {
            return redirect()->back()
                ->with('error', 'Sorry, some dates in your selected range are fully booked. Please select different dates.')
                ->withInput();
        }

        // Get all room categories with availability
        $roomCategories = RoomCategory::all();
        $availableCategories = [];

        foreach ($roomCategories as $category) {
            if ($category->isAvailableForDateRange($checkIn, $checkOut)) {
                $pricing = $category->calculateTotalPrice($checkIn, $checkOut);
                $availableCategories[] = [
                    'category' => $category,
                    'pricing' => $pricing
                ];
            }
        }

        if (empty($availableCategories)) {
            return redirect()->back()
                ->with('error', 'No rooms available for the selected dates. Please choose different dates.')
                ->withInput();
        }

        return view('booking.availability', [
            'availableCategories' => $availableCategories,
            'customerData' => $request->only(['customer_name', 'customer_email', 'customer_phone']),
            'checkIn' => $checkIn,
            'checkOut' => $checkOut
        ]);
    }

    /**
     * Process the booking.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'room_category_id' => 'required|exists:room_categories,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $roomCategory = RoomCategory::findOrFail($request->room_category_id);

        // Double-check availability
        if (!$roomCategory->isAvailableForDateRange($checkIn, $checkOut)) {
            return redirect()->back()
                ->with('error', 'Sorry, this room category is no longer available for the selected dates.')
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Find an available room in this category
            $availableRoom = $this->findAvailableRoom($roomCategory->id, $checkIn, $checkOut);
            
            if (!$availableRoom) {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', 'No rooms available in this category for the selected dates.')
                    ->withInput();
            }

            // Calculate pricing
            $pricing = $roomCategory->calculateTotalPrice($checkIn, $checkOut);

            // Create the booking
            $booking = Booking::create([
                'room_id' => $availableRoom->id,
                'room_category_id' => $roomCategory->id,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'check_in_date' => $checkIn,
                'check_out_date' => $checkOut,
                'total_nights' => $pricing['total_nights'],
                'base_price' => $pricing['base_price_per_night'],
                'weekend_surcharge' => $pricing['weekend_surcharge'],
                'consecutive_discount' => $pricing['consecutive_discount'],
                'total_amount' => $pricing['final_total'],
                'status' => 'confirmed'
            ]);

            // Update room availability
            RoomAvailability::updateAvailabilityForBooking(
                $roomCategory->id,
                $checkIn,
                $checkOut
            );

            DB::commit();

            return redirect()->route('booking.confirmation', $booking->booking_reference)
                ->with('success', 'Your booking has been confirmed!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'An error occurred while processing your booking. Please try again.')
                ->withInput();
        }
    }

    /**
     * Show booking confirmation page.
     */
    public function confirmation($bookingReference)
    {
        $booking = Booking::with(['room', 'roomCategory'])
            ->where('booking_reference', $bookingReference)
            ->firstOrFail();

        return view('booking.confirmation', compact('booking'));
    }

    /**
     * Find an available room in the specified category for the date range.
     */
    private function findAvailableRoom($roomCategoryId, Carbon $checkIn, Carbon $checkOut)
    {
        $rooms = Room::where('room_category_id', $roomCategoryId)
            ->where('status', 'available')
            ->get();

        foreach ($rooms as $room) {
            if ($room->isAvailableForDateRange($checkIn->format('Y-m-d'), $checkOut->format('Y-m-d'))) {
                return $room;
            }
        }

        return null;
    }

    /**
     * Get disabled dates for the calendar (fully booked dates).
     */
    public function getDisabledDates(Request $request)
    {
        // Get dates where all room categories are fully booked
        $fullyBookedDates = RoomAvailability::select('date')
            ->groupBy('date')
            ->havingRaw('SUM(available_rooms) = 0')
            ->pluck('date')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            })
            ->toArray();

        return response()->json($fullyBookedDates);
    }
}