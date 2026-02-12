<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::withCount('sectors')->get();
        return view('admin.settings.divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.divisions.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        Division::create($validated);

        return redirect()->route('admin.divisions.index')->with('success', 'Division créée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('admin.settings.divisions.create_edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $division->update($validated);

        return redirect()->route('admin.divisions.index')->with('success', 'Division mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        if ($division->sectors()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer une division contenant des secteurs.');
        }

        $division->delete();

        return redirect()->route('admin.divisions.index')->with('success', 'Division supprimée avec succès.');
    }
}
