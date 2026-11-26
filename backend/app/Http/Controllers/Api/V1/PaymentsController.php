<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(
            Payment::with('reservation')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:100',
            'payment_date' => 'required|date',
            'status' => 'required|string|max:50',
            'reference' => 'nullable|string|max:255'
        ]);

        $payment = Payment::create($data);

        return response()->json([
            'message' => 'Payment created successfully',
            'payment' => $payment
        ], 201);
    }

    public function show(string $id)
    {
        return response()->json(
            Payment::with('reservation')->findOrFail($id)
        );
    }

    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);

        $data = $request->validate([
            'reservation_id' => 'sometimes|required|exists:reservations,id',
            'amount' => 'sometimes|required|numeric|min:0',
            'payment_method' => 'sometimes|required|string|max:100',
            'payment_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|string|max:50',
            'reference' => 'sometimes|nullable|string|max:255'
        ]);

        $payment->update($data);

        return response()->json([
            'message' => 'Payment updated successfully',
            'payment' => $payment
        ]);
    }

    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully'
        ]);
    }
}
