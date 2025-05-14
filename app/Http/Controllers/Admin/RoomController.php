<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('roomtype')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomtypes = RoomType::all();
        return view('admin.rooms.create', compact('roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'no_beds' => 'required|integer|min:1',
            'total_room' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'desc' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Room::create([
            'room_type_id' => $request->room_type_id,
            'no_beds' => $request->no_beds,
            'total_room' => $request->total_room,
            'price' => $request->price,
            'image' => $request->image,
            'desc' => $request->desc,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $room = Room::findOrFail($id);
        $roomtypes = RoomType::all();

        return view('admin.rooms.edit', compact('room', 'roomtypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'no_beds' => 'required|integer|min:1',
            'total_room' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'desc' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $room = Room::findOrFail($id);
        $room->update([
            'room_type_id' => $request->room_type_id,
            'no_beds' => $request->no_beds,
            'total_room' => $request->total_room,
            'price' => $request->price,
            'image' => $request->image,
            'desc' => $request->desc,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
