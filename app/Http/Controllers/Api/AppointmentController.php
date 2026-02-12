<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * List user appointments.
     */
    public function index()
    {
        $appointments = auth()->user()->appointments()->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $appointments,
        ]);
    }

    /**
     * Book a new appointment.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_at' => 'required|date|after:now',
            'type' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $appointment = auth()->user()->appointments()->create(array_merge($validated, [
            'status' => 'scheduled',
            'end_at' => \Carbon\Carbon::parse($validated['start_at'])->addHour(),
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Appointment scheduled successfully',
            'data' => $appointment,
        ], 201);
    }
}
