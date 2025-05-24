<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OrderRequest;

class PageController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function list_rooms(): View
    {
        $rooms = Room::with('roomType')->get();
        return view('pages.rooms.index', compact('rooms'));
    }

    public function search(Request $request): View
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

    public function showReservationForm(int $id): View
    {
        $room = Room::with('roomType')->findOrFail($id);
        return view('pages.rooms.reserve', compact('room'));
    }

    public function storeReservation(OrderRequest $request, int $id): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a reservation.');
        }

        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        if (!$this->orderService->isRoomAvailable($id, $checkIn, $checkOut)) {
            return back()->with('error', 'The room is already reserved during the selected dates.');
        }

        $this->orderService->createReservation($id, $checkIn, $checkOut);

        return redirect()->route('rooms.reserve', $id)->with('success', 'Reservation successful!');
    }

    public function userOrders(): View
    {
        $orders = Order::with(['room.roomtype'])
            ->where('user_id', auth()->id())
            ->orderByDesc('check_in')
            ->get();

        return view('pages.orders.index', compact('orders'));
    }
}
