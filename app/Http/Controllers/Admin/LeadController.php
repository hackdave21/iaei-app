<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $leads = Lead::with(['user', 'assignedTo'])
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->search, function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($request->per_page ?? 15);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $leads,
            ]);
        }

        return view('admin.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.leads.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'company_name' => 'nullable|string',
            'status' => 'required|string',
            'source' => 'nullable|string',
            'type_demande' => 'required|in:rappel,devis,rdv,info',
            'type_projet' => 'nullable|string',
            'description_projet' => 'nullable|string',
            'budget_estime' => 'nullable|numeric',
            'assigned_to_user_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);

        $lead = Lead::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Lead created successfully',
                'data' => $lead,
            ], 201);
        }

        return redirect()->route('admin.leads.index')->with('success', 'Lead créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $lead->load(['user', 'simulations', 'quotations', 'appointments']);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $lead,
            ]);
        }

        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $users = User::all();
        return view('admin.leads.edit', compact('lead', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'email',
            'phone' => 'nullable|string',
            'company_name' => 'nullable|string',
            'status' => 'string',
            'source' => 'nullable|string',
            'type_demande' => 'sometimes|in:rappel,devis,rdv,info',
            'type_projet' => 'nullable|string',
            'description_projet' => 'nullable|string',
            'budget_estime' => 'nullable|numeric',
            'assigned_to_user_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);

        $lead->update($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Lead updated successfully',
                'data' => $lead,
            ]);
        }

        return redirect()->route('admin.leads.index')->with('success', 'Lead mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Lead deleted successfully',
            ]);
        }

        return redirect()->route('admin.leads.index')->with('success', 'Lead supprimé avec succès.');
    }
}
