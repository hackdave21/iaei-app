<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'code' => 'villa_3ch_standard',
                'nom' => 'Villa 3 chambres Standard',
                'description' => 'Villa familiale abordable avec 3 chambres',
                'icone' => '🏠',
                'secteur' => 'residentiel',
                'type_batiment' => 'villa',
                'standing' => 'standard',
                'default_values' => [
                    'surface_terrain' => 300,
                    'surface_habitable' => 110,
                    'emprise_sol' => 40,
                    'niveaux' => 1,
                    'hsp' => 2.60,
                    'zone_id' => 1,
                    'sol_id' => 1,
                ]
            ],
            [
                'code' => 'villa_4ch_confort',
                'nom' => 'Villa 4 chambres Confort',
                'description' => 'Villa familiale avec 4 chambres, garage et jardin',
                'icone' => '🏠',
                'secteur' => 'residentiel',
                'type_batiment' => 'villa',
                'standing' => 'confort',
                'default_values' => [
                    'surface_terrain' => 500,
                    'surface_habitable' => 160,
                    'emprise_sol' => 35,
                    'niveaux' => 2,
                    'sous_sols' => 0,
                    'hsp' => 2.80,
                    'zone_id' => 1,
                    'sol_id' => 1,
                    'cloture' => true,
                    'portail' => 'manuel_double',
                    'forage' => true,
                    'solaire' => 'solaire_5kwc',
                    'alarme' => 'alarme_basique',
                ]
            ],
            [
                'code' => 'villa_premium_piscine',
                'nom' => 'Villa Premium avec piscine',
                'description' => 'Villa de standing avec piscine et finitions haut de gamme',
                'icone' => '🏊',
                'secteur' => 'residentiel',
                'type_batiment' => 'villa',
                'standing' => 'premium',
                'default_values' => [
                    'surface_terrain' => 600,
                    'surface_habitable' => 250,
                    'emprise_sol' => 30,
                    'niveaux' => 2,
                    'hsp' => 3.00,
                    'zone_id' => 1,
                    'sol_id' => 1,
                    'piscine' => '8x4',
                    'portail' => 'motorise',
                    'solaire' => 'solaire_10kwc',
                    'alarme' => 'alarme_complete',
                ]
            ],
            [
                'code' => 'villa_prestige_luxe',
                'nom' => 'Villa Prestige de luxe',
                'description' => 'Le summum du luxe et du confort',
                'icone' => '👑',
                'secteur' => 'residentiel',
                'type_batiment' => 'villa',
                'standing' => 'prestige',
                'default_values' => [
                    'surface_terrain' => 1000,
                    'surface_habitable' => 500,
                    'emprise_sol' => 25,
                    'niveaux' => 2,
                    'hsp' => 3.20,
                    'zone_id' => 1,
                    'sol_id' => 1,
                    'piscine' => '12x5_debordement',
                    'portail' => 'motorise',
                    'solaire' => 'solaire_15kwc',
                    'alarme' => 'alarme_complete',
                    'video' => 'video_8cam',
                ]
            ],
            [
                'code' => 'bureaux_pme_200',
                'nom' => 'Bureaux PME 200m²',
                'description' => 'Espace professionnel optimisé pour PME',
                'icone' => '🏢',
                'secteur' => 'tertiaire',
                'type_batiment' => 'bureaux',
                'standing' => 'confort',
                'default_values' => [
                    'surface_terrain' => 400,
                    'surface_habitable' => 200,
                    'emprise_sol' => 50,
                    'niveaux' => 1,
                    'hsp' => 3.00,
                    'zone_id' => 1,
                    'sol_id' => 1,
                ]
            ],
        ];

        foreach ($templates as $template) {
            \App\Models\TemplateProjet::updateOrCreate(['code' => $template['code']], $template);
        }
    }
}
