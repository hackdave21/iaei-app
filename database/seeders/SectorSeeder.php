<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;
use App\Models\Division;

class SectorSeeder extends Seeder
{
    public function run(): void
    {
        $sectors = [
            // Construction
            'construction' => [
                ['name' => 'Bâtiment', 'slug' => 'batiment'],
                ['name' => 'Route', 'slug' => 'route'],
            ],
            // Énergies Renouvelables
            'enr' => [
                ['name' => 'Solaire Photovoltaïque', 'slug' => 'solar_pv'],
                ['name' => 'Pompage Solaire', 'slug' => 'solar_pumping'],
                ['name' => 'Biogaz', 'slug' => 'biogas'],
            ],
            // Agriculture
            'agriculture' => [
                ['name' => 'Maraîchage', 'slug' => 'market_gardening'],
                ['name' => 'Pisciculture', 'slug' => 'fish_farming'],
                ['name' => 'Aviculture', 'slug' => 'poultry_farming'],
            ],
        ];

        foreach ($sectors as $divisionSlug => $sectorList) {
            $division = Division::where('slug', $divisionSlug)->first();
            if ($division) {
                foreach ($sectorList as $sectorData) {
                    Sector::firstOrCreate(
                        ['slug' => $sectorData['slug']],
                        array_merge($sectorData, ['division_id' => $division->id])
                    );
                }
            }
        }
    }
}
