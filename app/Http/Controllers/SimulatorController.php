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

    public function profile()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        $user = auth()->user();
        // Simulation history will be fetched here later when the model is ready
        $simulations = $user->simulations()->latest()->get();
        
        return view('frontend.profile.index', compact('user', 'simulations'));
    }

    public function save(Request $request)
    {
        $data = $request->all();
        
        if (auth()->check()) {
            $simulation = new \App\Models\Simulation();
            $simulation->reference_id = 'SIM-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
            $simulation->user_id = auth()->id();
            $simulation->sector_type_id = 1; // Placeholder for now or map properly
            $simulation->input_quantity = $data['dimensions']['surface'] ?? 0;
            $simulation->total_amount_ttc = $data['total'] ?? 0;
            $simulation->total_amount_ht = ($data['total'] ?? 0) / 1.18; // Simple VAT reverse
            $simulation->base_amount = $data['base_amount'] ?? 0;
            $simulation->options_amount = $data['options_amount'] ?? 0;
            $simulation->status = 'saved';
            $simulation->configuration_data = [
                'secteur' => $data['secteur'],
                'typeBat' => $data['typeBat'],
                'standing' => $data['standing'],
                'zone' => $data['zone'],
                'sol' => $data['sol'],
                'dimensions' => $data['dimensions'],
                'options' => $data['options'],
                'details' => $data['details'] ?? []
            ];
            $simulation->save();
            
            return response()->json(['status' => 'success', 'redirect' => route('profile')]);
        } else {
            // Store in session for guest
            session(['pending_simulation' => $data]);
            return response()->json(['status' => 'guest', 'redirect' => route('register')]);
        }
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
