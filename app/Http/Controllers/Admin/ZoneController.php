<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::orderBy('nom')->get();
        return view('admin.zones.index', compact('zones'));
    }

    public function show(Zone $zone)
    {
        return view('admin.zones.show', compact('zone'));
    }

    public function create()
    {
        return view('admin.zones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:zones',
            'nom' => 'required',
            'coefficient' => 'required|numeric',
            'profondeur_forage' => 'nullable|integer',
            'prix_foncier_m2' => 'nullable|numeric',
            'description' => 'nullable',
        ]);

        Zone::create($validated);
        return redirect()->route('admin.zones.index')->with('success', 'Zone créée avec succès.');
    }

    public function edit(Zone $zone)
    {
        return view('admin.zones.edit', compact('zone'));
    }

    public function update(Request $request, Zone $zone)
    {
        $validated = $request->validate([
            'code' => 'required|unique:zones,code,' . $zone->id,
            'nom' => 'required',
            'coefficient' => 'required|numeric',
            'profondeur_forage' => 'nullable|integer',
            'prix_foncier_m2' => 'nullable|numeric',
            'description' => 'nullable',
        ]);

        $zone->update($validated);
        return redirect()->route('admin.zones.index')->with('success', 'Zone mise à jour avec succès.');
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect()->route('admin.zones.index')->with('success', 'Zone supprimée avec succès.');
    }
}
