<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeBatiment;
use Illuminate\Http\Request;

class TypeBatimentController extends Controller
{
    public function index()
    {
        $types = TypeBatiment::orderBy('nom')->get();
        return view('admin.type_batiments.index', compact('types'));
    }

    public function show(TypeBatiment $typeBatiment)
    {
        return view('admin.type_batiments.show', compact('typeBatiment'));
    }

    public function create()
    {
        return view('admin.type_batiments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:type_batiments',
            'nom' => 'required',
            'description' => 'nullable',
            'coefficient' => 'required|numeric',
        ]);

        TypeBatiment::create($validated);
        return redirect()->route('admin.type-batiments.index')->with('success', 'Type de bâtiment créé avec succès.');
    }

    public function edit(TypeBatiment $typeBatiment)
    {
        return view('admin.type_batiments.edit', compact('typeBatiment'));
    }

    public function update(Request $request, TypeBatiment $typeBatiment)
    {
        $validated = $request->validate([
            'code' => 'required|unique:type_batiments,code,' . $typeBatiment->id,
            'nom' => 'required',
            'description' => 'nullable',
            'coefficient' => 'required|numeric',
        ]);

        $typeBatiment->update($validated);
        return redirect()->route('admin.type-batiments.index')->with('success', 'Type de bâtiment mis à jour avec succès.');
    }

    public function destroy(TypeBatiment $typeBatiment)
    {
        $typeBatiment->delete();
        return redirect()->route('admin.type-batiments.index')->with('success', 'Type de bâtiment supprimé avec succès.');
    }
}
