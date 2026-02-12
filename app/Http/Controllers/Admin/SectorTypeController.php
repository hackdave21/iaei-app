<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\SectorType;
use App\Models\PricingRule;
use App\Models\PricingCoefficient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectorTypes = SectorType::with(['sector.division'])->get();
        return view('admin.settings.sector_types.index', compact('sectorTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectors = Sector::with('division')->get();
        return view('admin.settings.sector_types.create_edit', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_id' => 'required|exists:sectors,id',
            'name' => 'required|string|max:255',
            'base_price_mode' => 'required|string|in:fixed,area,unit',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        SectorType::create($validated);

        return redirect()->route('admin.sector-types.index')->with('success', 'Type de secteur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SectorType $sectorType)
    {
        $sectorType->load(['sector.division', 'pricingRules', 'pricingCoefficients']);
        return view('admin.settings.sector_types.show', compact('sectorType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SectorType $sectorType)
    {
        $sectors = Sector::with('division')->get();
        return view('admin.settings.sector_types.create_edit', compact('sectorType', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SectorType $sectorType)
    {
        $validated = $request->validate([
            'sector_id' => 'required|exists:sectors,id',
            'name' => 'required|string|max:255',
            'base_price_mode' => 'required|string|in:fixed,area,unit',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $sectorType->update($validated);

        return redirect()->route('admin.sector-types.index')->with('success', 'Type de secteur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SectorType $sectorType)
    {
        if ($sectorType->simulations()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer un type de secteur utilisé dans des simulations.');
        }

        $sectorType->delete();

        return redirect()->route('admin.sector-types.index')->with('success', 'Type de secteur supprimé avec succès.');
    }

    /**
     * Store a pricing rule for a sector type.
     */
    public function storePricingRule(Request $request, SectorType $sectorType)
    {
        $validated = $request->validate([
            'base_unit_price' => 'required|numeric|min:0',
            'currency_code' => 'required|string|max:3',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
        ]);

        $sectorType->pricingRules()->create($validated);

        return back()->with('success', 'Règle de prix ajoutée avec succès.');
    }

    /**
     * Store a pricing coefficient for a sector type.
     */
    public function storePricingCoefficient(Request $request, SectorType $sectorType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|numeric',
            'is_global' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_global'] = $request->has('is_global');

        $sectorType->pricingCoefficients()->create($validated);

        return back()->with('success', 'Coefficient ajouté avec succès.');
    }
}
