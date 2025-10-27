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
        Schema::create('room_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_category_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->integer('available_rooms')->default(3); // Available rooms for this category on this date
            $table->integer('booked_rooms')->default(0); // Booked rooms for this category on this date
            $table->timestamps();
            
            // Ensure unique combination of room_category and date
            $table->unique(['room_category_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_availabilities');
    }
};