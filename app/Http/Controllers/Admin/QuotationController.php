<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $quotations = Quotation::with(['lead', 'simulation'])
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $quotations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'simulation_id' => 'required|exists:simulations,id',
            'quotation_number' => 'required|string|unique:quotations,quotation_number',
            'valid_until' => 'required|date',
            'status' => 'required|string',
        ]);

        $quotation = Quotation::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Quotation created successfully',
            'data' => $quotation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotation $quotation)
    {
        return response()->json([
            'success' => true,
            'data' => $quotation->load(['lead', 'simulation']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        $validated = $request->validate([
            'status' => 'string',
            'valid_until' => 'date',
        ]);

        $quotation->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Quotation updated successfully',
            'data' => $quotation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Quotation deleted successfully',
        ]);
    }
}
