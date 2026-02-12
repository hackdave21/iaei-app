<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnergySolution;
use Illuminate\Http\Request;

class EnergySolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $solutions = EnergySolution::with('simulation')
            ->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $solutions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'simulation_id' => 'required|exists:simulations,id',
            'daily_consumption_kwh' => 'required|numeric',
            'peak_power_kw' => 'required|numeric',
            'autonomy_hours' => 'required|integer',
            'recommended_solar_capacity' => 'required|numeric',
            'recommended_storage_capacity' => 'required|numeric',
        ]);

        $solution = EnergySolution::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Energy solution created successfully',
            'data' => $solution,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EnergySolution $energySolution)
    {
        return response()->json([
            'success' => true,
            'data' => $energySolution->load('simulation'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EnergySolution $energySolution)
    {
        $validated = $request->validate([
            'daily_consumption_kwh' => 'numeric',
            'peak_power_kw' => 'numeric',
            'autonomy_hours' => 'integer',
            'recommended_solar_capacity' => 'numeric',
            'recommended_storage_capacity' => 'numeric',
        ]);

        $energySolution->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Energy solution updated successfully',
            'data' => $energySolution,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnergySolution $energySolution)
    {
        $energySolution->delete();

        return response()->json([
            'success' => true,
            'message' => 'Energy solution deleted successfully',
        ]);
    }
}
