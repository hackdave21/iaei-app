<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Lead;
use App\Models\User;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $leads = Lead::all();
        $commercial = User::where('email', 'commercial@aiae.tg')->first();

        if ($commercial) {
            foreach ($leads as $lead) {
                if (rand(1, 100) <= 40) { // 40% des leads ont un RDV
                    $start = fake()->dateTimeBetween('now', '+2 weeks');
                    $end = clone $start;
                    $end->modify('+1 hour');

                    Appointment::create([
                        'lead_id' => $lead->id,
                        'user_id' => $commercial->id,
                        //'title' => 'RDV Commercial - ' . $lead->last_name, // Colonne inexistante
                        'start_at' => $start,
                        'end_at' => $end,
                        'type' => 'meeting', // 'call' par défaut
                        //'location' => $lead->company_name ?? 'Bureaux AIAE', // Colonne inexistante
                        'notes' => 'Premier contact pour évaluation des besoins avec ' . $lead->last_name,
                        'status' => 'scheduled',
                    ]);
                }
            }
        }
    }
}
