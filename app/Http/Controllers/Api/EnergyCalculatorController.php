<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnergyCalculatorController extends Controller
{
    /**
     * Specific energy requirement analysis.
     */
    public function analyze(Request $request)
    {
        $validated = $request->validate([
            'monthly_bill' => 'required|numeric',
            'location' => 'required|string',
            'roof_surface' => 'nullable|numeric',
        ]);

        // Perform specific solar/energy logic
        $potential_kw = ($validated['roof_surface'] ?? 10) * 0.15;
        
        return response()->json([
            'success' => true,
            'data' => [
                'estimated_potential_kw' => $potential_kw,
                'annual_savings_estimate' => $validated['monthly_bill'] * 12 * 0.30,
            ],
        ]);
    }
}
