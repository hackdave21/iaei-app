<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OptionCategory;
use App\Models\SectorType;

class OptionCategorySeeder extends Seeder
{
    public function run(): void
    {
        $sectorTypes = SectorType::all();

        foreach ($sectorTypes as $type) {
            $categories = [];

            // Définir les catégories selon le type de secteur (basé sur le nom ou slug)
            if (str_contains($type->slug, 'residential')) {
                $categories[] = ['name' => 'Piscine', 'selection_mode' => 'single', 'is_required' => false];
                $categories[] = ['name' => 'Domotique', 'selection_mode' => 'multiple', 'is_required' => false];
                $categories[] = ['name' => 'Finitions', 'selection_mode' => 'single', 'is_required' => true];
            } elseif (str_contains($type->slug, 'solar') || str_contains($type->slug, 'enr')) {
                $categories[] = ['name' => 'Stockage (Batteries)', 'selection_mode' => 'single', 'is_required' => false];
                $categories[] = ['name' => 'Onduleur', 'selection_mode' => 'single', 'is_required' => true];
            } elseif (str_contains($type->slug, 'security')) {
                $categories[] = ['name' => 'Caméras', 'selection_mode' => 'multiple', 'is_required' => true];
                $categories[] = ['name' => 'Capteurs', 'selection_mode' => 'multiple', 'is_required' => false];
            } elseif (str_contains($type->slug, 'agricole')) {
                $categories[] = ['name' => 'Irrigation', 'selection_mode' => 'single', 'is_required' => false];
                $categories[] = ['name' => 'Serres', 'selection_mode' => 'single', 'is_required' => false];
            }

            foreach ($categories as $cat) {
                OptionCategory::firstOrCreate(
                    [
                        'sector_type_id' => $type->id,
                        'name' => $cat['name']
                    ],
                    [
                        'selection_mode' => $cat['selection_mode'],
                        'is_required' => $cat['is_required']
                    ]
                );
            }
        }
    }
}
