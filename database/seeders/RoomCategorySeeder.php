<?php

namespace Database\Seeders;

use App\Models\RoomCategory;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Premium Deluxe',
                'base_price' => 12000.00,
                'description' => 'Our most luxurious rooms featuring premium amenities, city views, and exclusive services. Perfect for special occasions and business travelers.',
                'total_rooms' => 3,
            ],
            [
                'name' => 'Super Deluxe',
                'base_price' => 10000.00,
                'description' => 'Spacious and comfortable rooms with modern amenities and elegant furnishing. Ideal for both leisure and business stays.',
                'total_rooms' => 3,
            ],
            [
                'name' => 'Standard Deluxe',
                'base_price' => 8000.00,
                'description' => 'Well-appointed rooms offering great value with all essential amenities for a comfortable stay.',
                'total_rooms' => 3,
            ],
        ];

        foreach ($categories as $category) {
            RoomCategory::create($category);
        }
    }
}