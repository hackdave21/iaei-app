<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Sol;
use App\Models\TypeBatiment;
use App\Models\Standing;
use App\Models\EquipementOption;
use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    public function index()
    {
        $typeBatiments = TypeBatiment::all();
        $standings = Standing::all();
        return view('frontend.simulator', compact('typeBatiments', 'standings'));
    }

    public function simulatorV1(Request $request)
    {
        $secteur = $request->query('secteur', 'residentiel');
        
        // Fetch reference data for the simulator
        $zones = Zone::all();
        $sols = Sol::all();
        $typeBatiments = TypeBatiment::all();
        $standings = Standing::all();
        $equipementOptions = EquipementOption::all();

        return view('frontend.simulateur_v1', compact(
            'secteur', 
            'zones', 
            'sols', 
            'typeBatiments', 
            'standings',
            'equipementOptions'
        ));
    }

    public function results(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Veuillez vous connecter pour voir les résultats de votre simulation.');
        }

        // Logic to process and display simulation results
        return view('frontend.simulation-results');
    }
}
