<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique(); // Unique booking reference
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_category_id')->constrained()->onDelete('cascade');
            
            // Customer details
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            
            // Booking details
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('total_nights');
            
            // Pricing details
            $table->decimal('base_price', 10, 2); // Base price per night
            $table->decimal('weekend_surcharge', 10, 2)->default(0); // Weekend surcharge amount
            $table->decimal('consecutive_discount', 10, 2)->default(0); // Consecutive nights discount
            $table->decimal('total_amount', 10, 2); // Final total amount
            
            // Booking status
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('confirmed');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};