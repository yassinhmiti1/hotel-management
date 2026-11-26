<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json(
            Reservation::with(['client', 'room'])->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests_count' => 'required|integer|min:1',
            'nights' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:50'
        ]);

        $reservation = Reservation::create($data);

        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    }

    public function show(string $id)
    {
        return response()->json(
            Reservation::with(['client', 'room'])->findOrFail($id)
        );
    }

    public function update(Request $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);

        $data = $request->validate([
            'client_id' => 'sometimes|required|exists:clients,id',
            'room_id' => 'sometimes|required|exists:rooms,id',
            'check_in' => 'sometimes|required|date',
            'check_out' => 'sometimes|required|date|after:check_in',
            'guests_count' => 'sometimes|required|integer|min:1',
            'nights' => 'sometimes|required|integer|min:1',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|string|max:50'
        ]);

        $reservation->update($data);

        return response()->json([
            'message' => 'Reservation updated successfully',
            'reservation' => $reservation
        ]);
    }

    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json([
            'message' => 'Reservation deleted successfully'
        ]);
    }
}
