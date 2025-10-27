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
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Premium Deluxe, Super Deluxe, Standard Deluxe
            $table->decimal('base_price', 10, 2); // Base price in BDT
            $table->text('description')->nullable();
            $table->integer('total_rooms')->default(3); // Each category has 3 rooms
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_categories');
    }
};