<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FactureController extends Controller
{
    public function index()
    {
        return response()->json(Facture::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'invoice_number' => 'required|string|unique:factures,invoice_number',
            'issue_date' => 'required|date',
            'subtotal' => 'required|numeric|min:0',
            'tax_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:50'
        ]);

        $facture = Facture::create($data);

        return response()->json([
            'message' => 'Invoice created successfully',
            'facture' => $facture
        ], 201);
    }

    public function show(string $id)
    {
        return response()->json(Facture::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $facture = Facture::findOrFail($id);

        $data = $request->validate([
            'reservation_id' => 'sometimes|required|exists:reservations,id',
            'invoice_number' => [
                'sometimes',
                'required',
                Rule::unique('factures', 'invoice_number')
                    ->ignore($facture->id)
            ],
            'issue_date' => 'sometimes|required|date',
            'subtotal' => 'sometimes|required|numeric|min:0',
            'tax_amount' => 'sometimes|required|numeric|min:0',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|string|max:50'
        ]);

        $facture->update($data);

        return response()->json([
            'message' => 'Invoice updated successfully',
            'facture' => $facture
        ]);
    }

    public function destroy(string $id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return response()->json([
            'message' => 'Invoice deleted successfully'
        ]);
    }
}
