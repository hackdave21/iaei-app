<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Get analytics overview.
     */
    public function index(Request $request)
    {
        $period = $request->period ?? 'last_30_days';
        
        $data = [
            'views_by_page' => AnalyticsEvent::select('page_url', DB::raw('count(*) as total'))
                ->where('event_type', 'page_view')
                ->groupBy('page_url')
                ->get(),
            'simulations_count' => DB::table('simulations')->count(),
            'leads_conversion_rate' => $this->calculateConversionRate(),
        ];

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    private function calculateConversionRate()
    {
        $totalSimulations = DB::table('simulations')->count();
        $totalLeads = DB::table('leads')->count();

        if ($totalSimulations === 0) return 0;

        return round(($totalLeads / $totalSimulations) * 100, 2);
    }
}
