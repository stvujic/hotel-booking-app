<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function list_rooms()
    {
        $rooms = Room::with('roomType')->get();
        return view('pages.rooms.index', compact('rooms'));
    }
}
