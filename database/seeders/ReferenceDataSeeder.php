<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2.1 Zones géographiques        // Update Zones with V5 constants
        foreach ([
            'grand_lome' => ['coefficient' => 1.00, 'profondeur_forage' => 60, 'prix_foncier_m2' => 50000],
            'maritime' => ['coefficient' => 1.08, 'profondeur_forage' => 45, 'prix_foncier_m2' => 25000],
            'plateaux' => ['coefficient' => 1.14, 'profondeur_forage' => 70, 'prix_foncier_m2' => 15000],
            'centrale' => ['coefficient' => 1.19, 'profondeur_forage' => 80, 'prix_foncier_m2' => 10000],
            'kara_savanes' => ['coefficient' => 1.25, 'profondeur_forage' => 90, 'prix_foncier_m2' => 8000],
        ] as $code => $data) {
            Zone::where('code', $code)->update($data);
        }

        // Update Sols with V5 constants
        foreach ([
            'ferralitique' => ['coefficient' => 1.00, 'prix_fondation_m2' => 25000],
            'ferrugineux' => ['coefficient' => 1.10, 'prix_fondation_m2' => 30000],
            'laterite' => ['coefficient' => 1.03, 'prix_fondation_m2' => 22000],
            'argileux' => ['coefficient' => 1.30, 'prix_fondation_m2' => 45000],
            'sableux' => ['coefficient' => 1.18, 'prix_fondation_m2' => 35000],
            'hydromorphe' => ['coefficient' => 1.48, 'prix_fondation_m2' => 65000],
            'rocheux' => ['coefficient' => 0.98, 'prix_fondation_m2' => 18000],
        ] as $code => $data) {
            Sol::where('code', $code)->update($data);
        }

        // Update Standings with V5 price ranges
        foreach ([
            'standard' => ['prix_base_min' => 180000, 'prix_base_max' => 250000],
            'confort' => ['prix_base_min' => 280000, 'prix_base_max' => 380000],
            'premium' => ['prix_base_min' => 420000, 'prix_base_max' => 550000],
            'prestige' => ['prix_base_min' => 600000, 'prix_base_max' => 900000],
        ] as $code => $data) {
            Standing::where('code', $code)->update($data);
        }

        // 2.3 Types de bâtiments
        $types = [
            ['code' => 'villa', 'nom' => 'Villa / Maison individuelle', 'icone' => '🏠', 'description' => 'Construction de plain-pied ou R+1'],
            ['code' => 'duplex', 'nom' => 'Duplex / Triplex', 'icone' => '🏡', 'description' => 'Logement sur plusieurs niveaux'],
            ['code' => 'immeuble', 'nom' => 'Immeuble de rapport', 'icone' => '🏢', 'description' => 'Plusieurs appartements (R+2 à R+5)'],
            ['code' => 'bureaux', 'nom' => 'Bureaux / Tertiaire', 'icone' => '💼', 'description' => 'Espaces professionnels'],
            ['code' => 'commerce', 'nom' => 'Commerce / Boutique', 'icone' => '🛒', 'description' => 'Locaux commerciaux'],
            ['code' => 'agricole', 'nom' => 'Hangar / Bâtiment agricole', 'icone' => '🚜', 'description' => 'Structures métalliques ou maçonnées'],
        ];

        foreach ($types as $type) {
            \App\Models\TypeBatiment::updateOrCreate(['code' => $type['code']], $type);
        }
    }
}
