<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingCoefficient;

class PricingCoefficientSeeder extends Seeder
{
    public function run(): void
    {
        $coefficients = [
            ['name' => 'Coef Difficulté 1', 'slug' => 'diff_1', 'value' => 1.0],
            ['name' => 'Coef Difficulté 2', 'slug' => 'diff_2', 'value' => 1.2],
            ['name' => 'Coef Difficulté 3', 'slug' => 'diff_3', 'value' => 1.5],
            ['name' => 'Coef Distance < 50km', 'slug' => 'dist_near', 'value' => 1.0],
            ['name' => 'Coef Distance > 50km', 'slug' => 'dist_far', 'value' => 1.3],
        ];

        foreach ($coefficients as $coeff) {
            PricingCoefficient::firstOrCreate(['slug' => $coeff['slug']], $coeff);
        }
    }
}
