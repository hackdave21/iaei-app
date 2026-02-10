<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnergySolution;
use App\Models\Simulation;

class EnergySolutionSeeder extends Seeder
{
    public function run(): void
    {
        // On attache des solutions aux simulations existantes
        $simulations = Simulation::all();

        foreach ($simulations as $simulation) {
            // Créer une solution énergétique pour chaque simulation
            EnergySolution::create([
                'simulation_id' => $simulation->id,
                'daily_consumption_kwh' => rand(10, 50),
                'peak_power_kw' => rand(3, 15),
                'autonomy_hours' => rand(4, 24),
                'recommended_solar_capacity' => rand(3000, 15000) / 1000, // kW
                'recommended_storage_capacity' => rand(5000, 30000) / 1000, // kWh
            ]);
        }
    }
}
