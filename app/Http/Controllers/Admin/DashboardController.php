<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Simulation;
use App\Models\Quotation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display global statistics for the dashboard.
     */
    public function index()
    {
        $stats = [
            'total_leads' => Lead::count(),
            'total_simulations' => Simulation::count(),
            'total_quotations' => Quotation::count(),
            'total_revenue' => Quotation::where('status', 'accepted')->sum('total_amount_ht') ?? 0,
            'avg_roi' => Simulation::join('simulation_results', 'simulations.id', '=', 'simulation_results.simulation_id')
                                   ->avg('simulation_results.roi_years') ?? 0,
            'recent_leads' => Lead::latest()->take(5)->get(),
        ];

        return response()->json([
            'success' => true,
            'message' => 'Dashboard statistics retrieved successfully',
            'data' => $stats,
        ]);
    }
}
