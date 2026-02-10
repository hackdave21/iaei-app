<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectorType;
use App\Models\Sector;
use Illuminate\Support\Str;

class SectorTypeSeeder extends Seeder
{
    public function run(): void
    {
        $sectors = Sector::all();
        
        $commonTypes = [
            ['name' => 'Résidentiel', 'slug_prefix' => 'residential'],
            ['name' => 'Tertiaire', 'slug_prefix' => 'commercial'],
            ['name' => 'Industriel', 'slug_prefix' => 'industrial'],
        ];

        foreach ($sectors as $sector) {
            foreach ($commonTypes as $type) {
                $slug = $type['slug_prefix'] . '-' . $sector->slug;
                
                SectorType::firstOrCreate(
                    ['slug' => $slug],
                    [
                        'name' => $type['name'],
                        'sector_id' => $sector->id,
                        'description' => $type['name'] . ' pour ' . $sector->name,
                        'base_price_mode' => 'area', // Valeur par défaut
                    ]
                );
            }

            // Cas spécifique Agriculture
            if (Str::contains($sector->slug, ['maraichage', 'pisciculture', 'aviculture', 'agri'])) {
                SectorType::firstOrCreate(
                    ['slug' => 'agricole-' . $sector->slug],
                    [
                        'name' => 'Exploitation Agricole',
                        'sector_id' => $sector->id,
                        'description' => 'Usage professionnel agricole',
                        'base_price_mode' => 'area'
                    ]
                );
            }
        }
    }
}
