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
        // 2.1 Zones géographiques
        $zones = [
            ['code' => 'grand_lome', 'nom' => 'Grand Lomé (Lomé, Baguida, Agoè, Adidogomé)', 'coefficient' => 1.00, 'profondeur_forage' => 60, 'prix_foncier_m2' => 50000],
            ['code' => 'maritime', 'nom' => 'Région Maritime (Tsévié, Aného, Vogan, Kpémé)', 'coefficient' => 1.08, 'profondeur_forage' => 45, 'prix_foncier_m2' => 25000],
            ['code' => 'plateaux', 'nom' => 'Région des Plateaux (Atakpamé, Kpalimé, Badou)', 'coefficient' => 1.14, 'profondeur_forage' => 70, 'prix_foncier_m2' => 15000],
            ['code' => 'centrale', 'nom' => 'Région Centrale (Sokodé, Tchamba, Blitta)', 'coefficient' => 1.19, 'profondeur_forage' => 80, 'prix_foncier_m2' => 10000],
            ['code' => 'kara_savanes', 'nom' => 'Kara et Savanes (Kara, Dapaong, Mango)', 'coefficient' => 1.25, 'profondeur_forage' => 90, 'prix_foncier_m2' => 8000],
        ];

        foreach ($zones as $zone) {
            \App\Models\Zone::updateOrCreate(['code' => $zone['code']], $zone);
        }

        // 2.2 Types de sol
        $sols = [
            ['code' => 'ferralitique', 'nom' => 'Ferralitique (terre de barre)', 'coefficient' => 1.00, 'prix_fondation_m2' => 25000, 'description' => 'Sol rouge-ocre, profond >3m, excellente portance. RÉFÉRENCE'],
            ['code' => 'ferrugineux', 'nom' => 'Ferrugineux tropical', 'coefficient' => 1.10, 'prix_fondation_m2' => 30000, 'description' => 'Ocre-brun, concrétions ferrugineuses, bonne portance'],
            ['code' => 'laterite', 'nom' => 'Latérite / Cuirasse', 'coefficient' => 1.03, 'prix_fondation_m2' => 22000, 'description' => 'Roche indurée très dure, excellente portance, terrassement coûteux'],
            ['code' => 'argileux', 'nom' => 'Argileux', 'coefficient' => 1.30, 'prix_fondation_m2' => 45000, 'description' => 'Plastique, fissures saison sèche. ÉTUDE GÉOTECHNIQUE OBLIGATOIRE', 'alerte' => true],
            ['code' => 'sableux', 'nom' => 'Sableux', 'coefficient' => 1.18, 'prix_fondation_m2' => 35000, 'description' => 'Granuleux, perméable, risque nappe proche'],
            ['code' => 'hydromorphe', 'nom' => 'Hydromorphe', 'coefficient' => 1.48, 'prix_fondation_m2' => 65000, 'description' => "Engorgé, proche cours d'eau. CONSTRUCTION DÉCONSEILLÉE", 'alerte' => true],
            ['code' => 'rocheux', 'nom' => 'Rocheux', 'coefficient' => 0.98, 'prix_fondation_m2' => 18000, 'description' => 'Roche dure à faible profondeur, excellente portance'],
        ];

        foreach ($sols as $sol) {
            \App\Models\Sol::updateOrCreate(['code' => $sol['code']], $sol);
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
