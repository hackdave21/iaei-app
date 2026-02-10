<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SimulationResult;
use App\Models\Simulation;

class SimulationResultSeeder extends Seeder
{
    public function run(): void
    {
        $simulations = Simulation::all();

        foreach ($simulations as $simulation) {
            SimulationResult::create([
                'simulation_id' => $simulation->id,
                'result_data' => json_encode([
                    'recommended_solution' => 'Système Solaire ' . rand(3, 10) . 'kW',
                    'estimated_cost' => rand(3000000, 6000000),
                    'payback_period_years' => rand(30, 70) / 10,
                    'co2_saved_tons' => rand(10, 50) / 10,
                    'technical_details' => [
                        'panels' => rand(6, 20),
                        'inverter' => rand(3, 10) . 'kW',
                        'batteries' => rand(2, 8)
                    ]
                ]),
                // pdf_path left null
            ]);
        }
    }
}
