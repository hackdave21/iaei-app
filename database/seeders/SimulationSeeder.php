<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Simulation;
use App\Models\Lead;
use App\Models\SectorType;

class SimulationSeeder extends Seeder
{
    public function run(): void
    {
        $leads = Lead::all();
        $sectorTypes = SectorType::all();

        if ($sectorTypes->isEmpty()) {
            return;
        }

        foreach ($leads as $lead) {
            // 70% des leads ont une simulation
            if (rand(1, 100) <= 70) {
                $sectorType = $sectorTypes->random();
                $baseAmount = rand(500000, 5000000);
                $taxAmount = $baseAmount * 0.18;
                
                Simulation::create([
                    'reference_id' => 'SIM-' . date('Y') . '-' . rand(10000, 99999),
                    'lead_id' => $lead->id,
                    'user_id' => $lead->user_id, // Créateur du lead
                    'sector_type_id' => $sectorType->id,
                    
                    // Données financières
                    'input_quantity' => rand(50, 500), // m2 ou kWh
                    'base_amount' => $baseAmount,
                    'options_amount' => 0,
                    'coefficient_modifier' => 1.0,
                    'total_amount_ht' => $baseAmount,
                    'tax_amount' => $taxAmount,
                    'total_amount_ttc' => $baseAmount + $taxAmount,
                    
                    'status' => 'draft',
                    'configuration_data' => json_encode([
                        'location' => fake()->city(),
                        'energy_consumption' => rand(100, 1000) . ' kWh/mois',
                        'roof_orientation' => 'South',
                        'project_name' => 'Simulation pour ' . $lead->last_name
                    ]),
                    'created_at' => fake()->dateTimeBetween($lead->created_at, 'now'),
                ]);
            }
        }
    }
}
