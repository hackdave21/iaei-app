<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplateProjet;
use Illuminate\Http\Request;

class TemplateProjetController extends Controller
{
    public function index()
    {
        $templates = TemplateProjet::orderBy('ordre_affichage')->get();
        return view('admin.templates_projets.index', compact('templates'));
    }

    public function show(TemplateProjet $templateProjet)
    {
        return view('admin.templates_projets.show', compact('templateProjet'));
    }

    public function create()
    {
        return view('admin.templates_projets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:templates_projets',
            'nom' => 'required',
            'description' => 'nullable',
            'icone' => 'nullable',
            'secteur' => 'required',
            'type_batiment' => 'required',
            'standing' => 'required',
            'default_values' => 'nullable|array',
            'ordre_affichage' => 'required|integer',
        ]);

        TemplateProjet::create($validated);
        return redirect()->route('admin.templates-projets.index')->with('success', 'Modèle de projet créé avec succès.');
    }

    public function edit(TemplateProjet $templateProjet)
    {
        return view('admin.templates_projets.edit', compact('templateProjet'));
    }

    public function update(Request $request, TemplateProjet $templateProjet)
    {
        $validated = $request->validate([
            'code' => 'required|unique:templates_projets,code,' . $templateProjet->id,
            'nom' => 'required',
            'description' => 'nullable',
            'icone' => 'nullable',
            'secteur' => 'required',
            'type_batiment' => 'required',
            'standing' => 'required',
            'default_values' => 'nullable|array',
            'ordre_affichage' => 'required|integer',
        ]);

        $templateProjet->update($validated);
        return redirect()->route('admin.templates-projets.index')->with('success', 'Modèle de projet mis à jour avec succès.');
    }

    public function destroy(TemplateProjet $templateProjet)
    {
        $templateProjet->delete();
        return redirect()->route('admin.templates-projets.index')->with('success', 'Modèle de projet supprimé avec succès.');
    }
}
