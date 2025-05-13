<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomType::create(['name'=>  'Standard Room']);
        RoomType::create(['name' => 'Business Suite']);
        RoomType::create(['name' => 'Family Comfort']);
        RoomType::create(['name' => 'Economy Room']);
        RoomType::create(['name' => 'Penthouse Exclusive']);

    }
}
