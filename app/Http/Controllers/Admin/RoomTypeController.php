<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomtypes = RoomType::all();

        return view('admin.roomtypes.index', compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roomtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        RoomType::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type added successfully.');
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
    public function edit(string $id)
    {
        $roomtype = RoomType::findOrFail($id);
        return view('admin.roomtypes.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $roomtype = RoomType::findOrFail($id);
        $roomtype->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $roomtype = RoomType::findOrFail($id);
        $roomtype->delete();

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type deleted successfully.');
    }
}
