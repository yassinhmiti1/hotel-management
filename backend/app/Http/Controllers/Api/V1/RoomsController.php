<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json(
            Room::with('roomType')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:50|unique:rooms,room_number',
            'floor' => 'required|integer|min:0',
            'status' => 'required|in:available,maintenance,out_of_service',
            'description' => 'nullable|string'
        ]);

        $room = Room::create($data);

        return response()->json([
            'message' => 'Room created successfully',
            'room' => $room
        ], 201);
    }

    public function show(string $id)
    {
        return response()->json(
            Room::with('roomType')->findOrFail($id)
        );
    }

    public function update(Request $request, string $id)
    {
        $room = Room::findOrFail($id);

        $data = $request->validate([
            'room_type_id' => 'sometimes|required|exists:room_types,id',
            'room_number' => [
                'sometimes',
                'required',
                Rule::unique('rooms', 'room_number')->ignore($room->id)
            ],
            'floor' => 'sometimes|required|integer|min:0',
            'status' => 'sometimes|required|in:available,maintenance,out_of_service',
            'description' => 'sometimes|nullable|string'
        ]);

        $room->update($data);

        return response()->json([
            'message' => 'Room updated successfully',
            'room' => $room
        ]);
    }

    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json([
            'message' => 'Room deleted successfully'
        ]);
    }
}
