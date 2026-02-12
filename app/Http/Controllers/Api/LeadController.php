<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Capture lead from site form.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'source' => 'nullable|string|max:100',
        ]);

        $lead = Lead::create(array_merge($validated, [
            'status' => 'new',
            'user_id' => auth()->id(),
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Your request has been sent successfully. Our team will contact you soon.',
            'data' => $lead,
        ], 201);
    }
}
