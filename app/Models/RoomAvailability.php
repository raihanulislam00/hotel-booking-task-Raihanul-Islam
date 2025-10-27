<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class RoomAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_category_id',
        'date',
        'available_rooms',
        'booked_rooms'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    /**
     * Get the room category that owns the availability.
     */
    public function roomCategory(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class);
    }

    /**
     * Update availability when a booking is made.
     */
    public static function updateAvailabilityForBooking($roomCategoryId, Carbon $checkIn, Carbon $checkOut)
    {
        $current = $checkIn->copy();
        
        while ($current->lt($checkOut)) {
            $availability = self::firstOrCreate(
                [
                    'room_category_id' => $roomCategoryId,
                    'date' => $current->format('Y-m-d')
                ],
                [
                    'available_rooms' => 3,
                    'booked_rooms' => 0
                ]
            );
            
            // Decrease available rooms and increase booked rooms
            $availability->available_rooms = max(0, $availability->available_rooms - 1);
            $availability->booked_rooms += 1;
            $availability->save();
            
            $current->addDay();
        }
    }

    /**
     * Restore availability when a booking is cancelled.
     */
    public static function restoreAvailabilityForBooking($roomCategoryId, Carbon $checkIn, Carbon $checkOut)
    {
        $current = $checkIn->copy();
        
        while ($current->lt($checkOut)) {
            $availability = self::where('room_category_id', $roomCategoryId)
                ->where('date', $current->format('Y-m-d'))
                ->first();
            
            if ($availability) {
                $availability->available_rooms = min(3, $availability->available_rooms + 1);
                $availability->booked_rooms = max(0, $availability->booked_rooms - 1);
                $availability->save();
            }
            
            $current->addDay();
        }
    }

    /**
     * Check if any date in range is fully booked.
     */
    public static function isAnyDateFullyBooked(Carbon $checkIn, Carbon $checkOut): bool
    {
        $current = $checkIn->copy();
        
        while ($current->lt($checkOut)) {
            // Check if all room categories are fully booked for this date
            $totalAvailableRooms = self::where('date', $current->format('Y-m-d'))
                ->sum('available_rooms');
            
            // If we have availability records and total available is 0, date is fully booked
            if (self::where('date', $current->format('Y-m-d'))->exists() && $totalAvailableRooms == 0) {
                return true;
            }
            
            $current->addDay();
        }
        
        return false;
    }
}