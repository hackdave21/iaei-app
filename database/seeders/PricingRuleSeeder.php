<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingRule;
use App\Models\SectorType;

class PricingRuleSeeder extends Seeder
{
    public function run(): void
    {
        $sectorTypes = SectorType::all();

        foreach ($sectorTypes as $type) {
            // Créer une règle de prix de base par secteur
            PricingRule::firstOrCreate(
                [
                    'sector_type_id' => $type->id,
                    'currency_code' => 'XOF'
                ],
                [
                    'base_unit_price' => $this->getBasePrice($type),
                    'valid_from' => now()->startOfYear(),
                ]
            );
        }
    }

    private function getBasePrice($type)
    {
        if (str_contains($type->slug, 'residential')) return 350000; // prix au m2
        if (str_contains($type->slug, 'commercial')) return 450000;
        if (str_contains($type->slug, 'solar')) return 1000; // prix au Wc ?
        if (str_contains($type->slug, 'agricole')) return 500; // prix au m2
        return 100000;
    }
}
