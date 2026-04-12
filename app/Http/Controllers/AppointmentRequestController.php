<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Lead;
use Illuminate\Http\Request;

class AppointmentRequestController extends Controller
{
    /**
     * Store a new appointment request from the frontend.
     * The user must be authenticated.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rdv_type' => 'required|in:physique,appel',
            'rdv_message' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();

        // Find or create a Lead for this user
        $lead = Lead::firstOrCreate(
            ['email' => $user->email],
            [
                'first_name' => explode(' ', $user->name, 2)[0],
                'last_name' => explode(' ', $user->name, 2)[1] ?? $user->name,
                'phone' => $user->phone,
                'source' => 'Website RDV',
                'status' => 'new',
                'type_demande' => 'rdv',
            ]
        );

        // Map type
        $typeLabel = $request->rdv_type === 'physique' ? 'on_site' : 'call';

        // Create the appointment
        $appointment = Appointment::create([
            'lead_id' => $lead->id,
            'user_id' => $user->id,
            'start_at' => now(), // Placeholder — admin will set the actual date
            'end_at' => now()->addHour(),
            'type' => $typeLabel,
            'status' => 'pending',
            'notes' => $request->rdv_message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Votre demande de rendez-vous a été envoyée avec succès ! Notre équipe vous recontactera sous 24 à 48h pour confirmer.',
        ]);
    }
}
