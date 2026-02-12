<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationRequestController extends Controller
{
    /**
     * Request a quotation from a simulation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'simulation_id' => 'required|exists:simulations,id',
            'notes' => 'nullable|string',
        ]);

        $simulation = auth()->user()->simulations()->findOrFail($validated['simulation_id']);

        $quotation = Quotation::create([
            'lead_id' => $simulation->lead_id,
            'simulation_id' => $simulation->id,
            'quotation_number' => 'REQ-' . time(),
            'status' => 'pending',
            'valid_until' => now()->addDays(30),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Quotation request submitted successfully',
            'data' => $quotation,
        ], 201);
    }
}
