<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sol;
use Illuminate\Http\Request;

class SolController extends Controller
{
    public function index()
    {
        $sols = Sol::orderBy('nom')->get();
        return view('admin.sols.index', compact('sols'));
    }

    public function show(Sol $sol)
    {
        return view('admin.sols.show', compact('sol'));
    }

    public function create()
    {
        return view('admin.sols.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:sols',
            'nom' => 'required',
            'coefficient' => 'required|numeric',
            'prix_fondation_m2' => 'nullable|numeric',
            'description' => 'nullable',
            'alerte' => 'nullable',
        ]);

        Sol::create($validated);
        return redirect()->route('admin.sols.index')->with('success', 'Type de sol créé avec succès.');
    }

    public function edit(Sol $sol)
    {
        return view('admin.sols.edit', compact('sol'));
    }

    public function update(Request $request, Sol $sol)
    {
        $validated = $request->validate([
            'code' => 'required|unique:sols,code,' . $sol->id,
            'nom' => 'required',
            'coefficient' => 'required|numeric',
            'prix_fondation_m2' => 'nullable|numeric',
            'description' => 'nullable',
            'alerte' => 'nullable',
        ]);

        $sol->update($validated);
        return redirect()->route('admin.sols.index')->with('success', 'Type de sol mis à jour avec succès.');
    }

    public function destroy(Sol $sol)
    {
        $sol->delete();
        return redirect()->route('admin.sols.index')->with('success', 'Type de sol supprimé avec succès.');
    }
}
