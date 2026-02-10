<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\User;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $commercial = User::where('email', 'commercial@aiae.tg')->first();
        $admin = User::where('email', 'admin@aiae.tg')->first();

        $sources = ['Facebook', 'LinkedIn', 'Site Web', 'Parrainage', 'Emailing'];
        $statuses = ['new', 'contacted', 'qualified', 'proposal_sent', 'negotiation', 'won', 'lost'];

        if ($commercial) {
            // Créer 20 leads pour le commercial
            for ($i = 0; $i < 20; $i++) {
                Lead::create([
                    'user_id' => $admin ? $admin->id : $commercial->id, // Créé par
                    'assigned_to_user_id' => $commercial->id,
                    'status' => $statuses[array_rand($statuses)],
                    'source' => $sources[array_rand($sources)],
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'email' => fake()->unique()->safeEmail(),
                    'phone' => fake()->phoneNumber(),
                    'company_name' => fake()->optional(0.4)->company(), // 40% chance d'avoir une entreprise
                    'notes' => fake()->sentence(),
                    'created_at' => fake()->dateTimeBetween('-2 months', 'now'),
                ]);
            }
        }
    }
}
