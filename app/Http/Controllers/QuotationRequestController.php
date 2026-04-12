<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuotationRequestController extends Controller
{
    /**
     * Store a new quotation request from the contact form.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'country_residence' => 'nullable|string',
            'project_type' => 'nullable|string',
            'delay' => 'nullable|string',
            'project_description' => 'required|string',
            'location' => 'nullable|string',
            'budget' => 'nullable|string',
            'source_discovery' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240', // 10MB max
        ]);

        // 1. Process Name
        $names = explode(' ', $request->full_name, 2);
        $firstName = $names[0];
        $lastName = $names[1] ?? $names[0];

        // 2. Create or Update Lead
        $lead = Lead::updateOrCreate(
            ['email' => $request->email],
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone' => $request->phone,
                'pays_residence' => $request->country_residence,
                'type_demande' => 'devis',
                'type_projet' => $request->project_type,
                'delai_souhaite' => $request->delay,
                'description_projet' => $request->project_description,
                'localisation_projet' => $request->location,
                'budget_estime' => $this->parseBudget($request->budget),
                'source' => $request->source_discovery,
                'status' => 'new'
            ]
        );

        // 3. Create Quotation record (The "Request")
        $quotation = new Quotation();
        $quotation->lead_id = $lead->id;
        $quotation->quotation_number = 'REQ-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $quotation->valid_until = now()->addDays(30);
        $quotation->status = 'pending';

        // 4. Handle Attachment
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('quotation_requests', 'public');
            $quotation->pdf_path = $path; // Repurposing pdf_path for the client attachment in this context
        }

        $quotation->save();

        return response()->json([
            'success' => true,
            'message' => 'Votre demande de devis a été envoyée avec succès. Notre équipe vous contactera sous 48h.',
            'quotation_number' => $quotation->quotation_number
        ]);
    }

    /**
     * Simple helper to parse budget strings if possible, or return 0.
     */
    private function parseBudget($budget)
    {
        if (!$budget) return 0;
        // Strip non-numeric except dot/comma
        $numeric = preg_replace('/[^0-9]/', '', $budget);
        return (float) ($numeric ?: 0);
    }
}
