<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function list_rooms()
    {
        $rooms = Room::with('roomType')->get();
        return view('pages.rooms.index', compact('rooms'));
    }

    public function search(Request $request)
    {
        $query = Room::query()->with('roomType');

        if ($request->filled('no_beds')) {
            $query->where('no_beds', $request->input('no_beds'));
        }

        if ($request->filled('room_type_id')) {
            $query->where('room_type_id', $request->input('room_type_id'));
        }

        $rooms = $query->get();

        return view('pages.rooms.index', compact('rooms'));
    }

    public function showReservationForm($id)
    {
        $room = Room::with('roomType')->findOrFail($id);
        return view('pages.rooms.reserve', compact('room'));
    }

    public function storeReservation(Request $request, $id)
    {
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a reservation.');
        }

        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        // Provera da li je soba zauzeta u tom periodu
        $overlap = Order::where('room_id', $id)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        if ($overlap) {
            return back()->with('error', 'The room is already reserved during the selected dates.');
        }

        Order::create([
            'room_id' => $id,
            'user_id' => auth()->id(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
        ]);

        return redirect()->route('rooms.reserve', $id)->with('success', 'Reservation successful!');
    }


}
