<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::with('division')->withCount('sectorTypes')->get();
        return view('admin.settings.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::active()->get();
        return view('admin.settings.sectors.create_edit', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Sector::create($validated);

        return redirect()->route('admin.sectors.index')->with('success', 'Secteur créé avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        $divisions = Division::active()->get();
        return view('admin.settings.sectors.create_edit', compact('sector', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $sector->update($validated);

        return redirect()->route('admin.sectors.index')->with('success', 'Secteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        if ($sector->sectorTypes()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer un secteur contenant des types de secteur.');
        }

        $sector->delete();

        return redirect()->route('admin.sectors.index')->with('success', 'Secteur supprimé avec succès.');
    }
}
