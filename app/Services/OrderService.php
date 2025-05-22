<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OrderService
{
    public function isRoomAvailable(int $roomId, string $checkIn, string $checkOut): bool
    {
        return !Order::where('room_id', $roomId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();
    }

    public function createReservation(int $roomId, string $checkIn, string $checkOut): Order
    {
        return Order::create([
            'room_id' => $roomId,
            'user_id' => Auth::id(),
            'check_in' => Carbon::parse($checkIn),
            'check_out' => Carbon::parse($checkOut),
        ]);
    }
}
