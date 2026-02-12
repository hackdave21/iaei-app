<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingRule;
use Illuminate\Http\Request;

class PricingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rules = PricingRule::with('sectorType')
            ->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $rules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_type_id' => 'required|exists:sector_types,id',
            'base_unit_price' => 'required|numeric',
            'currency_code' => 'required|string|max:3',
            'valid_from' => 'required|date',
            'valid_until' => 'nullable|date',
        ]);

        $rule = PricingRule::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pricing rule created successfully',
            'data' => $rule,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PricingRule $pricingRule)
    {
        return response()->json([
            'success' => true,
            'data' => $pricingRule->load('sectorType'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PricingRule $pricingRule)
    {
        $validated = $request->validate([
            'base_unit_price' => 'numeric',
            'currency_code' => 'string|max:3',
            'valid_from' => 'date',
            'valid_until' => 'nullable|date',
        ]);

        $pricingRule->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pricing rule updated successfully',
            'data' => $pricingRule,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingRule $pricingRule)
    {
        $pricingRule->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pricing rule deleted successfully',
            ]);
        }

        return redirect()->back()->with('success', 'Règle de prix supprimée avec succès.');
    }
}
