<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'room_id',
        'room_category_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'check_in_date',
        'check_out_date',
        'total_nights',
        'base_price',
        'weekend_surcharge',
        'consecutive_discount',
        'total_amount',
        'status'
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'base_price' => 'decimal:2',
        'weekend_surcharge' => 'decimal:2',
        'consecutive_discount' => 'decimal:2',
        'total_amount' => 'decimal:2'
    ];

    /**
     * Get the room that owns the booking.
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the room category that owns the booking.
     */
    public function roomCategory(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class);
    }

    /**
     * Generate a unique booking reference.
     */
    public static function generateBookingReference(): string
    {
        do {
            $reference = 'BK' . strtoupper(uniqid());
        } while (self::where('booking_reference', $reference)->exists());
        
        return $reference;
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($booking) {
            if (empty($booking->booking_reference)) {
                $booking->booking_reference = self::generateBookingReference();
            }
        });
    }

    /**
     * Get formatted check-in date.
     */
    public function getFormattedCheckInAttribute(): string
    {
        return $this->check_in_date instanceof Carbon ? $this->check_in_date->format('F d, Y') : '';
    }

    /**
     * Get formatted check-out date.
     */
    public function getFormattedCheckOutAttribute(): string
    {
        return $this->check_out_date instanceof Carbon ? $this->check_out_date->format('F d, Y') : '';
    }

    /**
     * Get the duration of stay in a readable format.
     */
    public function getDurationAttribute(): string
    {
        $nights = $this->total_nights;
        return $nights . ' ' . ($nights == 1 ? 'night' : 'nights');
    }
}