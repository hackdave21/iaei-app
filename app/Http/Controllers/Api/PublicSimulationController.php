<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Simulation;
use App\Models\SimulationResult;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicSimulationController extends Controller
{
    /**
     * Perform a simulation calculation.
     */
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'sector_type_id' => 'required|exists:sector_types,id',
            'input_quantity' => 'required|numeric|min:1',
            'configuration_data' => 'nullable|array',
        ]);

        // Logic for calculation would go here.
        // For now, generating a dummy result.
        $baseAmount = $validated['input_quantity'] * 1500; // Example logic
        $tax = $baseAmount * 0.20;
        
        $result = [
            'base_amount' => $baseAmount,
            'tax_amount' => $tax,
            'total_amount_ttc' => $baseAmount + $tax,
            'estimated_roi_years' => 7.5,
        ];

        return response()->json([
            'success' => true,
            'message' => 'Simulation calculated successfully',
            'data' => $result,
        ]);
    }

    /**
     * Store simulation if user is authenticated.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_type_id' => 'required|exists:sector_types,id',
            'input_quantity' => 'required|numeric',
            'total_amount_ht' => 'required|numeric',
            'configuration_data' => 'nullable|array',
        ]);

        $simulation = Simulation::create([
            'reference_id' => 'SIM-' . strtoupper(Str::random(8)),
            'user_id' => auth()->id(),
            'sector_type_id' => $validated['sector_type_id'],
            'input_quantity' => $validated['input_quantity'],
            'total_amount_ht' => $validated['total_amount_ht'],
            'status' => 'draft',
            'configuration_data' => $validated['configuration_data'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Simulation saved successfully',
            'data' => $simulation,
        ], 201);
    }
}
