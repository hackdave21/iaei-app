<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $standings = [
            [
                'name' => 'Standard',
                'code' => 'standard',
                'prix_m2_min' => 180000,
                'prix_m2_max' => 250000,
                'emprise_max' => 50,
                'hsp' => 2.60,
                'terrain_min' => 200,
                'niveaux_max' => 1,
                'marge' => 0.17,
            ],
            [
                'name' => 'Confort',
                'code' => 'confort',
                'prix_m2_min' => 280000,
                'prix_m2_max' => 380000,
                'emprise_max' => 40,
                'hsp' => 2.80,
                'terrain_min' => 400,
                'niveaux_max' => 1,
                'marge' => 0.20,
            ],
            [
                'name' => 'Premium',
                'code' => 'premium',
                'prix_m2_min' => 420000,
                'prix_m2_max' => 550000,
                'emprise_max' => 35,
                'hsp' => 3.00,
                'terrain_min' => 500,
                'niveaux_max' => 2,
                'marge' => 0.23,
            ],
            [
                'name' => 'Prestige',
                'code' => 'prestige',
                'prix_m2_min' => 600000,
                'prix_m2_max' => 900000,
                'emprise_max' => 30,
                'hsp' => 3.20,
                'terrain_min' => 800,
                'niveaux_max' => 2,
                'marge' => 0.27,
            ],
        ];

        foreach ($standings as $standing) {
            \App\Models\Standing::updateOrCreate(['code' => $standing['code']], $standing);
        }
    }
}
