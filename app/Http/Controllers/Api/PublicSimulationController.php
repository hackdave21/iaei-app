<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Simulation;
use App\Models\SimulationResult;
use Illuminate\Http\Request;
use App\Services\EstimationService;
use App\Services\DeductionService;
use Illuminate\Support\Str;

class PublicSimulationController extends Controller
{
    /**
     * Perform a simulation calculation.
     */
    protected $estimationService;
    protected $deductionService;

    public function __construct(EstimationService $estimationService, DeductionService $deductionService)
    {
        $this->estimationService = $estimationService;
        $this->deductionService = $deductionService;
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'standing' => 'required|string|exists:standings,code',
            'surface_batie' => 'required|numeric|min:1',
            'option_ids' => 'sometimes|array',
            'option_ids.*' => 'exists:equipement_options,id',
        ]);

        if (!isset($validated['option_ids'])) {
            $validated['option_ids'] = $this->deductionService->suggestOptions($validated['standing']);
        }

        $result = $this->estimationService->calculate($validated);

        return response()->json([
            'success' => true,
            'data' => $result
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
