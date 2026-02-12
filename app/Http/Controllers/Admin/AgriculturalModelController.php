<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalModel;
use Illuminate\Http\Request;

class AgriculturalModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $models = AgriculturalModel::with('sectorType')
            ->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $models,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_type_id' => 'required|exists:sector_types,id',
            'name' => 'required|string|max:255',
            'cycle_duration_days' => 'required|integer',
            'yield_per_unit' => 'required|numeric',
        ]);

        $model = AgriculturalModel::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agricultural model created successfully',
            'data' => $model,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AgriculturalModel $agriculturalModel)
    {
        return response()->json([
            'success' => true,
            'data' => $agriculturalModel->load(['sectorType', 'costs']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgriculturalModel $agriculturalModel)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'cycle_duration_days' => 'integer',
            'yield_per_unit' => 'numeric',
        ]);

        $agriculturalModel->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agricultural model updated successfully',
            'data' => $agriculturalModel,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgriculturalModel $agriculturalModel)
    {
        $agriculturalModel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Agricultural model deleted successfully',
        ]);
    }
}
