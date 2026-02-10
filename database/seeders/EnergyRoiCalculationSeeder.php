<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnergyRoiCalculation;
use App\Models\Simulation;

class EnergyRoiCalculationSeeder extends Seeder
{
    public function run(): void
    {
        $simulations = Simulation::all();

        foreach ($simulations as $simulation) {
            $investment = rand(2000000, 15000000);
            $annualSavings = $investment * (rand(12, 25) / 100);

            EnergyRoiCalculation::create([
                'simulation_id' => $simulation->id,
                'initial_investment' => $investment,
                'monthly_savings' => $annualSavings / 12,
                'yearly_savings' => $annualSavings,
                'roi_years' => $investment / $annualSavings,
                'co2_saved_tons' => rand(10, 100) / 10,
            ]);
        }
    }
}
