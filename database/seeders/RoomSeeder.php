<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = RoomCategory::all();
        
        foreach ($categories as $category) {
            // Create 3 rooms for each category
            for ($i = 1; $i <= 3; $i++) {
                $roomNumber = $this->generateRoomNumber($category->name, $i);
                
                Room::create([
                    'room_category_id' => $category->id,
                    'room_number' => $roomNumber,
                    'status' => 'available',
                ]);
            }
        }
    }
    
    /**
     * Generate room number based on category and sequence.
     */
    private function generateRoomNumber(string $categoryName, int $sequence): string
    {
        $prefix = match ($categoryName) {
            'Premium Deluxe' => 'PD',
            'Super Deluxe' => 'SD',
            'Standard Deluxe' => 'ST',
            default => 'RM',
        };
        
        return $prefix . str_pad($sequence, 3, '0', STR_PAD_LEFT);
    }
}