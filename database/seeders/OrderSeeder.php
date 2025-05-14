<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Uzmi nekoliko korisnika i soba iz baze
        $users = User::where('is_admin', false)->get();
        $rooms = Room::all();

        // Ako nema korisnika ili soba, prekini
        if ($users->isEmpty() || $rooms->isEmpty()) {
            return;
        }

        foreach ($users as $user) {
            $randomRoom = $rooms->random();

            $checkIn = Carbon::now()->addDays(rand(1, 10));
            $checkOut = (clone $checkIn)->addDays(rand(1, 5));

            Order::create([
                'user_id' => $user->id,
                'room_id' => $randomRoom->id,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
            ]);
        }
    }
}
