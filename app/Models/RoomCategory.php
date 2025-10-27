<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class RoomCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'base_price',
        'description',
        'total_rooms'
    ];

    protected $casts = [
        'base_price' => 'decimal:2'
    ];

    /**
     * Get the rooms for this category.
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Get the bookings for this category.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get room availabilities for this category.
     */
    public function availabilities(): HasMany
    {
        return $this->hasMany(RoomAvailability::class);
    }

    /**
     * Calculate price for a specific date (includes weekend surcharge).
     */
    public function getPriceForDate(Carbon $date): float
    {
        $basePrice = $this->base_price;
        
        // Check if it's weekend (Friday or Saturday)
        if ($date->isFriday() || $date->isSaturday()) {
            $basePrice = $basePrice * 1.2; // 20% surcharge
        }
        
        return $basePrice;
    }

    /**
     * Calculate total price for date range with discounts.
     */
    public function calculateTotalPrice(Carbon $checkIn, Carbon $checkOut): array
    {
        $dates = [];
        $current = $checkIn->copy();
        $totalBasePrice = 0;
        $weekendSurcharge = 0;
        $totalNights = $checkIn->diffInDays($checkOut);
        
        // Calculate price for each night
        while ($current->lt($checkOut)) {
            $dailyPrice = $this->getPriceForDate($current);
            $dates[] = [
                'date' => $current->format('Y-m-d'),
                'price' => $dailyPrice,
                'is_weekend' => $current->isFriday() || $current->isSaturday()
            ];
            
            if ($current->isFriday() || $current->isSaturday()) {
                $weekendSurcharge += ($dailyPrice - $this->base_price);
            }
            
            $totalBasePrice += $dailyPrice;
            $current->addDay();
        }
        
        // Apply consecutive nights discount (10% for 3+ nights)
        $consecutiveDiscount = 0;
        if ($totalNights >= 3) {
            $consecutiveDiscount = $totalBasePrice * 0.1;
        }
        
        $finalTotal = $totalBasePrice - $consecutiveDiscount;
        
        return [
            'total_nights' => $totalNights,
            'base_price_per_night' => $this->base_price,
            'total_base_price' => $totalBasePrice,
            'weekend_surcharge' => $weekendSurcharge,
            'consecutive_discount' => $consecutiveDiscount,
            'final_total' => $finalTotal,
            'daily_breakdown' => $dates
        ];
    }

    /**
     * Check availability for date range.
     */
    public function isAvailableForDateRange(Carbon $checkIn, Carbon $checkOut): bool
    {
        $current = $checkIn->copy();
        
        while ($current->lt($checkOut)) {
            if (!$this->isAvailableForDate($current)) {
                return false;
            }
            $current->addDay();
        }
        
        return true;
    }

    /**
     * Check availability for a specific date.
     */
    public function isAvailableForDate(Carbon $date): bool
    {
        $availability = $this->availabilities()
            ->where('date', $date->format('Y-m-d'))
            ->first();
        
        if (!$availability) {
            // If no record exists, assume all rooms are available
            return true;
        }
        
        return $availability->available_rooms > 0;
    }

    /**
     * Get available rooms count for a specific date.
     */
    public function getAvailableRoomsForDate(Carbon $date): int
    {
        $availability = $this->availabilities()
            ->where('date', $date->format('Y-m-d'))
            ->first();
        
        if (!$availability) {
            return $this->total_rooms;
        }
        
        return $availability->available_rooms;
    }
}