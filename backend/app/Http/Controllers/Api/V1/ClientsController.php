<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(
            Client::with('user')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'identity_type' => 'required|in:CIN,Passport,Resident_Card',
            'identity_number' => 'required|string|max:100'
        ]);

        $client = Client::create($data);

        return response()->json([
            'message' => 'Client created successfully',
            'client' => $client
        ], 201);
    }

    public function show(string $id)
    {
        $client = Client::with('user')->findOrFail($id);

        return response()->json($client);
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|nullable|exists:users,id',
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|nullable|string',
            'identity_type' => [
                'sometimes',
                'required',
                Rule::in(['CIN', 'Passport', 'Resident_Card'])
            ],
            'identity_number' => 'sometimes|required|string|max:100'
        ]);

        $client->update($data);

        return response()->json([
            'message' => 'Client updated successfully',
            'client' => $client
        ]);
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json([
            'message' => 'Client deleted successfully'
        ]);
    }
}
