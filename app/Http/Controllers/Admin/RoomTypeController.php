<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RoomTypeRequest;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roomtypes = RoomType::all();
        return view('admin.roomtypes.index', compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.roomtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomTypeRequest $request): RedirectResponse
    {
        RoomType::create($request->validated());

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $roomtype = RoomType::findOrFail($id);
        return view('admin.roomtypes.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomTypeRequest $request, int $id): RedirectResponse
    {
        $roomtype = RoomType::findOrFail($id);
        $roomtype->update($request->validated());

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $roomtype = RoomType::findOrFail($id);
        $roomtype->delete();

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type deleted successfully.');
    }
}
