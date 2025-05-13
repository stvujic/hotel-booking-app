<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        Room::create([
            'total_room' => 3,
            'no_beds' => 2,
            'price' => 100,
            'image' => 'standard.jpg',
            'status' => true,
            'desc' => 'Standard Room with essential amenities.',
            'room_type_id' => 1,
        ]);

        Room::create([
            'total_room' => 2,
            'no_beds' => 1,
            'price' => 150,
            'image' => 'business.jpg',
            'status' => true,
            'desc' => 'Business Suite with workspace and coffee machine.',
            'room_type_id' => 2,
        ]);

        Room::create([
            'total_room' => 4,
            'no_beds' => 3,
            'price' => 180,
            'image' => 'family.jpg',
            'status' => true,
            'desc' => 'Spacious Family Comfort room with kids amenities.',
            'room_type_id' => 3,
        ]);

        Room::create([
            'total_room' => 5,
            'no_beds' => 2,
            'price' => 70,
            'image' => 'economy.jpg',
            'status' => true,
            'desc' => 'Affordable Economy Room, perfect for short stays.',
            'room_type_id' => 4,
        ]);

        Room::create([
            'total_room' => 1,
            'no_beds' => 1,
            'price' => 250,
            'image' => 'penthouse.jpg',
            'status' => true,
            'desc' => 'Luxurious Penthouse with exclusive view and services.',
            'room_type_id' => 5,
        ]);
    }
}
