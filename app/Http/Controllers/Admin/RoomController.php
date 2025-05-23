<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $rooms = Room::with('roomtype')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roomtypes = RoomType::all();
        return view('admin.rooms.create', compact('roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request): RedirectResponse
    {
        Room::create($request->validated());

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
    public function edit(int $id): View
    {
        $room = Room::findOrFail($id);
        $roomtypes = RoomType::all();

        return view('admin.rooms.edit', compact('room', 'roomtypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, int $id): RedirectResponse
    {
        $room = Room::findOrFail($id);
        $room->update($request->validated());

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
