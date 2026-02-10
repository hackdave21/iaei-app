<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;
use App\Models\OptionCategory;

class OptionSeeder extends Seeder
{
    public function run(): void
    {
        $categories = OptionCategory::all();

        foreach ($categories as $category) {
            $options = [];

            if ($category->name === 'Piscine') {
                $options = [
                    ['name' => 'Standard (8x4m)', 'price_modifier' => 5000000, 'modifier_type' => 'fixed'],
                    ['name' => 'Olympique (12x5m)', 'price_modifier' => 12000000, 'modifier_type' => 'fixed'],
                    ['name' => 'Débordement', 'price_modifier' => 2500000, 'modifier_type' => 'fixed'],
                ];
            } elseif ($category->name === 'Domotique') {
                $options = [
                    ['name' => 'Pack Éclairage Connecté', 'price_modifier' => 350000, 'modifier_type' => 'fixed'],
                    ['name' => 'Assistant Vocal', 'price_modifier' => 50000, 'modifier_type' => 'fixed'],
                ];
            } elseif (str_contains($category->name, 'Stockage')) {
                $options = [
                    ['name' => 'Lithium 5kWh', 'price_modifier' => 1200000, 'modifier_type' => 'fixed'],
                    ['name' => 'Gel 200Ah', 'price_modifier' => 250000, 'modifier_type' => 'fixed'],
                ];
            } elseif ($category->name === 'Irrigation') {
                 $options = [
                    ['name' => 'Goutte à goutte', 'price_modifier' => 1500, 'modifier_type' => 'unit_add'], // par m2 ?
                    ['name' => 'Aspersion', 'price_modifier' => 800, 'modifier_type' => 'unit_add'],
                ];
            }

            foreach ($options as $opt) {
                Option::firstOrCreate(
                    [
                        'option_category_id' => $category->id,
                        'name' => $opt['name']
                    ],
                    [
                        'price_modifier' => $opt['price_modifier'],
                        'modifier_type' => $opt['modifier_type'],
                        'is_default' => false
                    ]
                );
            }
        }
    }
}
