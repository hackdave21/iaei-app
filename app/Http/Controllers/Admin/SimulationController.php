<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simulation;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $simulations = Simulation::with(['user', 'lead', 'sectorType'])
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate($request->per_page ?? 15);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $simulations,
            ]);
        }

        return view('admin.simulations.index', compact('simulations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'lead_id' => 'nullable|exists:leads,id',
            'sector_type_id' => 'required|exists:sector_types,id',
            'input_quantity' => 'required|numeric',
            'total_amount_ht' => 'required|numeric',
            'status' => 'required|string',
            'configuration_data' => 'nullable|array',
        ]);

        $simulation = Simulation::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Simulation created successfully',
            'data' => $simulation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Simulation $simulation)
    {
        $simulation->load(['user', 'lead', 'sectorType', 'result', 'simulationOptions.option']);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $simulation,
            ]);
        }

        return view('admin.simulations.show', compact('simulation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Simulation $simulation)
    {
        $validated = $request->validate([
            'status' => 'string',
            'configuration_data' => 'array',
            'total_amount_ht' => 'numeric',
        ]);

        $simulation->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Simulation updated successfully',
            'data' => $simulation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Simulation $simulation)
    {
        $simulation->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Simulation deleted successfully',
            ]);
        }

        return redirect()->route('admin.simulations.index')->with('success', 'Simulation supprimée avec succès.');
    }
}
