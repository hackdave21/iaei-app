<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quotation;
use App\Models\Simulation;

class QuotationSeeder extends Seeder
{
    public function run(): void
    {
        // On crée des devis basés sur les simulations existantes
        $simulations = Simulation::all();

        foreach ($simulations as $simulation) {
            // Pas toutes les simulations deviennent des devis (ex: 60%)
            if (rand(1, 100) <= 60) {
                $status = ['draft', 'sent', 'accepted', 'rejected'][array_rand(['draft', 'sent', 'accepted', 'rejected'])];
                
                Quotation::create([
                    'lead_id' => $simulation->lead_id,
                    'simulation_id' => $simulation->id,
                    'quotation_number' => 'DEV-' . date('Y') . '-' . rand(10000, 99999),
                    'status' => $status,
                    'valid_until' => now()->addDays(30),
                    // Les montants sont dans la simulation liée
                ]);
            }
        }
    }
}
