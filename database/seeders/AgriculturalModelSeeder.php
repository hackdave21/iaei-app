<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgriculturalModel;
use App\Models\SectorType;

class AgriculturalModelSeeder extends Seeder
{
    public function run(): void
    {
        // On cherche le type 'agricole' correspondant au maraîchage
        // Slug pattern: 'agricole-' . $sector->slug
        // Sector slug: market_gardening
        $maraichageType = SectorType::where('slug', 'agricole-market_gardening')->first();
        $piscicultureType = SectorType::where('slug', 'agricole-fish_farming')->first();
        $avicultureType = SectorType::where('slug', 'agricole-poultry_farming')->first();

        // Fallback si pas trouvé (cas de test partiel)
        $defaultType = SectorType::where('slug', 'like', 'agricole%')->first();

        $models = [
            [
                'name' => 'Culture de Tomates (Sous Serre)',
                'cycle_duration_days' => 90,
                'yield_per_unit' => 1500,
                'sector_type_id' => $maraichageType ? $maraichageType->id : ($defaultType?->id)
            ],
            [
                'name' => 'Culture de Maïs',
                'cycle_duration_days' => 120,
                'yield_per_unit' => 5000,
                'sector_type_id' => $maraichageType ? $maraichageType->id : ($defaultType?->id)
            ],
            [
                'name' => 'Pisciculture Tilapia',
                'cycle_duration_days' => 180,
                'yield_per_unit' => 2000,
                'sector_type_id' => $piscicultureType ? $piscicultureType->id : ($defaultType?->id)
            ],
            [
                'name' => 'Élevage Poulets de Chair',
                'cycle_duration_days' => 45,
                'yield_per_unit' => 2.5,
                'sector_type_id' => $avicultureType ? $avicultureType->id : ($defaultType?->id)
            ],
        ];

        foreach ($models as $model) {
            if (isset($model['sector_type_id'])) {
                AgriculturalModel::firstOrCreate(['name' => $model['name']], $model);
            }
        }
    }
}
