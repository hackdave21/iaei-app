<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Simulation;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display global statistics for the dashboard.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalLeads = Lead::count();
        $totalSimulations = Simulation::count();
        $totalQuotations = Quotation::count();
        
        $chiffreAffairesTotal = Quotation::where('quotations.status', 'accepted')
            ->join('simulations', 'quotations.simulation_id', '=', 'simulations.id')
            ->sum('simulations.total_amount_ht') ?? 0;

        $simulationsParSecteur = DB::table('simulations')
            ->join('sector_types', 'simulations.sector_type_id', '=', 'sector_types.id')
            ->select('sector_types.name', DB::raw('count(*) as total'))
            ->groupBy('sector_types.name')
            ->get();

        $leadsRecents = Lead::with('user')->latest()->take(5)->get();
        $devisRecents = Quotation::with('lead')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalLeads',
            'totalSimulations',
            'totalQuotations',
            'chiffreAffairesTotal',
            'simulationsParSecteur',
            'leadsRecents',
            'devisRecents'
        ));
    }
}
