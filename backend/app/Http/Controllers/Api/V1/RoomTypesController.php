<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        return response()->json(RoomType::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0'
        ]);

        $roomType = RoomType::create($data);

        return response()->json([
            'message' => 'Room type created successfully',
            'room_type' => $roomType
        ], 201);
    }

    public function show(string $id)
    {
        return response()->json(RoomType::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $roomType = RoomType::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'capacity' => 'sometimes|required|integer|min:1',
            'base_price' => 'sometimes|required|numeric|min:0'
        ]);

        $roomType->update($data);

        return response()->json([
            'message' => 'Room type updated successfully',
            'room_type' => $roomType
        ]);
    }

    public function destroy(string $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();

        return response()->json([
            'message' => 'Room type deleted successfully'
        ]);
    }
}
