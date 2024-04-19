<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoomResource::collection(Rooms::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = Rooms::create([
            'room_number' => $request->room_number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'branch' => $request->branch,
        ]);

        return new RoomResource($room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $room)
    {
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rooms $room)
    {
        $room->update([
            'room_number' => $request->room_number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'branch' => $request->branch,
        ]);

        return new RoomResource($room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $room)
    {
        return $room->delete();
    }
}
