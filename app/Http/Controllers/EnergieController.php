<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnergieController extends Controller
{
    /**
     * Affiche le calculateur autonome
     */
    public function calculator()
    {
        $zones = DB::table('zones_irradiation')->get();
        $equipements = DB::table('equipements_energie')->where('actif', true)->get();
        $cheptels = DB::table('cheptel_biogaz')->where('actif', true)->get();
        $collectes = DB::table('taux_collecte')->where('actif', true)->get();

        return view('frontend.energie.calculator', compact('zones', 'equipements', 'cheptels', 'collectes'));
    }

    /**
     * Affiche une simulation sauvegardée
     */
    public function show($code)
    {
        $estimation = DB::table('estimations_energie')->where('code_estimation', $code)->first();
        
        if (!$estimation) {
            abort(404);
        }

        return view('frontend.energie.results', compact('estimation'));
    }
}
