<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EquipementOption;
use Illuminate\Http\Request;

class EquipementOptionController extends Controller
{
    public function index()
    {
        $options = EquipementOption::orderBy('categorie')->orderBy('ordre_affichage')->get();
        return view('admin.equipement_options.index', compact('options'));
    }

    public function show(EquipementOption $equipementOption)
    {
        return view('admin.equipement_options.show', compact('equipementOption'));
    }

    public function create()
    {
        return view('admin.equipement_options.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:equipement_options',
            'categorie' => 'required',
            'designation' => 'required',
            'prix_min' => 'required|numeric',
            'prix_max' => 'required|numeric',
            'puissance' => 'nullable',
            'unite' => 'required',
            'description' => 'nullable',
            'ordre_affichage' => 'required|integer',
            'actif' => 'boolean',
        ]);

        EquipementOption::create($validated);
        return redirect()->route('admin.equipement-options.index')->with('success', 'Option d\'équipement créée avec succès.');
    }

    public function edit(EquipementOption $equipementOption)
    {
        return view('admin.equipement_options.edit', compact('equipementOption'));
    }

    public function update(Request $request, EquipementOption $equipementOption)
    {
        $validated = $request->validate([
            'code' => 'required|unique:equipement_options,code,' . $equipementOption->id,
            'categorie' => 'required',
            'designation' => 'required',
            'prix_min' => 'required|numeric',
            'prix_max' => 'required|numeric',
            'puissance' => 'nullable',
            'unite' => 'required',
            'description' => 'nullable',
            'ordre_affichage' => 'required|integer',
            'actif' => 'boolean',
        ]);

        $equipementOption->update($validated);
        return redirect()->route('admin.equipement-options.index')->with('success', 'Option d\'équipement mise à jour avec succès.');
    }

    public function destroy(EquipementOption $equipementOption)
    {
        $equipementOption->delete();
        return redirect()->route('admin.equipement-options.index')->with('success', 'Option d\'équipement supprimée avec succès.');
    }
}
