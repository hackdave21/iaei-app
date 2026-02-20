<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipementOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            // SOLAIRE
            ['code' => 'solaire_3kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 3 kWc', 'prix_min' => 3500000, 'prix_max' => 5000000, 'puissance' => '3 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_5kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 5 kWc', 'prix_min' => 5500000, 'prix_max' => 8000000, 'puissance' => '5 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_10kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 10 kWc', 'prix_min' => 11000000, 'prix_max' => 15000000, 'puissance' => '10 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_15kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 15 kWc', 'prix_min' => 16000000, 'prix_max' => 21000000, 'puissance' => '15 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_20kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 20 kWc', 'prix_min' => 21000000, 'prix_max' => 27000000, 'puissance' => '20 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_30kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 30 kWc', 'prix_min' => 30000000, 'prix_max' => 40000000, 'puissance' => '30 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_50kwc', 'categorie' => 'solaire', 'designation' => 'Kit solaire hybride 50 kWc', 'prix_min' => 48000000, 'prix_max' => 63000000, 'puissance' => '50 kWc', 'unite' => 'Forf.'],
            ['code' => 'solaire_custom', 'categorie' => 'solaire', 'designation' => 'Kit solaire sur mesure', 'prix_min' => 1000000, 'prix_max' => 1300000, 'puissance' => 'Sur mesure', 'unite' => '/kWc'],

            // GROUPES ÉLECTROGÈNES
            ['code' => 'groupe_15kva', 'categorie' => 'groupe', 'designation' => 'Groupe électrogène 15 kVA', 'prix_min' => 2800000, 'prix_max' => 3800000, 'puissance' => '15 kVA', 'unite' => 'U'],
            ['code' => 'groupe_30kva', 'categorie' => 'groupe', 'designation' => 'Groupe électrogène 30 kVA', 'prix_min' => 5000000, 'prix_max' => 6500000, 'puissance' => '30 kVA', 'unite' => 'U'],
            ['code' => 'groupe_60kva', 'categorie' => 'groupe', 'designation' => 'Groupe électrogène 60 kVA', 'prix_min' => 9000000, 'prix_max' => 12000000, 'puissance' => '60 kVA', 'unite' => 'U'],
            ['code' => 'groupe_100kva', 'categorie' => 'groupe', 'designation' => 'Groupe électrogène 100 kVA', 'prix_min' => 15000000, 'prix_max' => 19000000, 'puissance' => '100 kVA', 'unite' => 'U'],
            ['code' => 'groupe_200kva', 'categorie' => 'groupe', 'designation' => 'Groupe électrogène 200 kVA', 'prix_min' => 27000000, 'prix_max' => 33000000, 'puissance' => '200 kVA', 'unite' => 'U'],
            ['code' => 'groupe_500kva', 'categorie' => 'groupe', 'designation' => 'Groupe électrogène 500 kVA', 'prix_min' => 60000000, 'prix_max' => 78000000, 'puissance' => '500 kVA', 'unite' => 'U'],

            // SÉCURITÉ - ALARME
            ['code' => 'alarme_basique', 'categorie' => 'securite', 'designation' => 'Alarme anti-intrusion basique', 'prix_min' => 350000, 'prix_max' => 500000, 'puissance' => '4 détecteurs', 'unite' => 'Forf.'],
            ['code' => 'alarme_avancee', 'categorie' => 'securite', 'designation' => 'Alarme anti-intrusion avancée', 'prix_min' => 600000, 'prix_max' => 850000, 'puissance' => '6 détecteurs', 'unite' => 'Forf.'],
            ['code' => 'alarme_complete', 'categorie' => 'securite', 'designation' => 'Alarme complète connectée', 'prix_min' => 900000, 'prix_max' => 1400000, 'puissance' => '8+ détecteurs', 'unite' => 'Forf.'],

            // SÉCURITÉ - VIDÉOSURVEILLANCE
            ['code' => 'video_4cam', 'categorie' => 'securite', 'designation' => 'Vidéosurveillance IP 4 caméras', 'prix_min' => 500000, 'prix_max' => 850000, 'puissance' => '4 caméras', 'unite' => 'Forf.'],
            ['code' => 'video_8cam', 'categorie' => 'securite', 'designation' => 'Vidéosurveillance IP 8 caméras', 'prix_min' => 1000000, 'prix_max' => 1500000, 'puissance' => '8 caméras', 'unite' => 'Forf.'],
            ['code' => 'video_16cam', 'categorie' => 'securite', 'designation' => 'Vidéosurveillance IP 16 caméras', 'prix_min' => 2000000, 'prix_max' => 2800000, 'puissance' => '16 caméras', 'unite' => 'Forf.'],

            // SÉCURITÉ - CONTRÔLE D'ACCÈS
            ['code' => 'ctrl_acces_simple', 'categorie' => 'securite', 'designation' => 'Contrôle accès simple', 'prix_min' => 450000, 'prix_max' => 650000, 'puissance' => '1 porte', 'unite' => 'Forf.'],
            ['code' => 'ctrl_acces_complet', 'categorie' => 'securite', 'designation' => 'Contrôle accès complet', 'prix_min' => 1800000, 'prix_max' => 2500000, 'puissance' => '4 portes', 'unite' => 'Forf.'],

            // CLÔTURES
            ['code' => 'cloture_prefab', 'categorie' => 'exterieur', 'designation' => 'Clôture panneaux préfab.', 'prix_min' => 50000, 'prix_max' => 70000, 'puissance' => 'H=2m', 'unite' => 'ml'],
            ['code' => 'cloture_agglos', 'categorie' => 'exterieur', 'designation' => 'Clôture agglos crépi', 'prix_min' => 65000, 'prix_max' => 90000, 'puissance' => 'H=2m', 'unite' => 'ml'],
            ['code' => 'cloture_mixte', 'categorie' => 'exterieur', 'designation' => 'Clôture mixte agglos+grille', 'prix_min' => 75000, 'prix_max' => 100000, 'puissance' => 'H=2m', 'unite' => 'ml'],
            ['code' => 'cloture_hg', 'categorie' => 'exterieur', 'designation' => 'Clôture haut de gamme', 'prix_min' => 110000, 'prix_max' => 150000, 'puissance' => 'H=2m', 'unite' => 'ml'],

            // PORTAILS
            ['code' => 'portillon', 'categorie' => 'exterieur', 'designation' => 'Portillon piéton', 'prix_min' => 130000, 'prix_max' => 200000, 'puissance' => '1m', 'unite' => 'U'],
            ['code' => 'portail_simple', 'categorie' => 'exterieur', 'designation' => 'Portail métallique simple', 'prix_min' => 350000, 'prix_max' => 500000, 'puissance' => '3m', 'unite' => 'U'],
            ['code' => 'portail_double', 'categorie' => 'exterieur', 'designation' => 'Portail métallique double', 'prix_min' => 600000, 'prix_max' => 800000, 'puissance' => '5m', 'unite' => 'U'],
            ['code' => 'portail_motorise', 'categorie' => 'exterieur', 'designation' => 'Portail coulissant motorisé', 'prix_min' => 1200000, 'prix_max' => 1600000, 'puissance' => '5m', 'unite' => 'U'],

            // FORAGE
            ['code' => 'forage_30m', 'categorie' => 'exterieur', 'designation' => 'Forage équipé 30m', 'prix_min' => 2500000, 'prix_max' => 3500000, 'puissance' => '30m', 'unite' => 'Forf.'],
            ['code' => 'forage_60m', 'categorie' => 'exterieur', 'designation' => 'Forage équipé 60m', 'prix_min' => 4000000, 'prix_max' => 5800000, 'puissance' => '60m', 'unite' => 'Forf.'],
            ['code' => 'forage_90m', 'categorie' => 'exterieur', 'designation' => 'Forage équipé 90m', 'prix_min' => 5500000, 'prix_max' => 8000000, 'puissance' => '90m', 'unite' => 'Forf.'],
            ['code' => 'forage_120m', 'categorie' => 'exterieur', 'designation' => 'Forage équipé 120m', 'prix_min' => 7500000, 'prix_max' => 11000000, 'puissance' => '120m', 'unite' => 'Forf.'],

            // PISCINES
            ['code' => 'piscine_6x3', 'categorie' => 'exterieur', 'designation' => 'Piscine béton carrelée 6x3', 'prix_min' => 6000000, 'prix_max' => 9000000, 'puissance' => '6×3m', 'unite' => 'Forf.'],
            ['code' => 'piscine_8x4', 'categorie' => 'exterieur', 'designation' => 'Piscine béton carrelée 8x4', 'prix_min' => 9500000, 'prix_max' => 13000000, 'puissance' => '8×4m', 'unite' => 'Forf.'],
            ['code' => 'piscine_10x5', 'categorie' => 'exterieur', 'designation' => 'Piscine béton carrelée 10x5', 'prix_min' => 14000000, 'prix_max' => 19000000, 'puissance' => '10×5m', 'unite' => 'Forf.'],
            ['code' => 'piscine_12x5', 'categorie' => 'exterieur', 'designation' => 'Piscine à débordement 12x5', 'prix_min' => 22000000, 'prix_max' => 30000000, 'puissance' => '12×5m', 'unite' => 'Forf.'],
            ['code' => 'piscine_plage', 'categorie' => 'exterieur', 'designation' => 'Piscine avec plage immergée 8x4', 'prix_min' => 16000000, 'prix_max' => 22000000, 'puissance' => '8×4m', 'unite' => 'Forf.'],

            // DOMOTIQUE
            ['code' => 'domotique_basique', 'categorie' => 'domotique', 'designation' => 'Domotique éclairage connecté', 'prix_min' => 400000, 'prix_max' => 700000, 'puissance' => '8-12 points', 'unite' => 'Forf.'],
            ['code' => 'domotique_partielle', 'categorie' => 'domotique', 'designation' => 'Domotique partielle', 'prix_min' => 1200000, 'prix_max' => 2000000, 'puissance' => '15-20 points', 'unite' => 'Forf.'],
            ['code' => 'domotique_complete', 'categorie' => 'domotique', 'designation' => 'Maison intelligente complète', 'prix_min' => 3000000, 'prix_max' => 5500000, 'puissance' => 'Tous circuits', 'unite' => 'Forf.'],

            // AMÉNAGEMENT PAYSAGER
            ['code' => 'paysager_basique', 'categorie' => 'exterieur', 'designation' => 'Aménagement paysager basique', 'prix_min' => 1500000, 'prix_max' => 3000000, 'puissance' => '~200m²', 'unite' => 'Forf.'],
            ['code' => 'paysager_soigne', 'categorie' => 'exterieur', 'designation' => 'Jardin soigné complet', 'prix_min' => 3000000, 'prix_max' => 5500000, 'puissance' => '~300m²', 'unite' => 'Forf.'],
            ['code' => 'paysager_prestige', 'categorie' => 'exterieur', 'designation' => 'Design paysager prestige', 'prix_min' => 6000000, 'prix_max' => 12000000, 'puissance' => '500m²+', 'unite' => 'Forf.'],

            // VOLETS ROULANTS
            ['code' => 'volet_manuel', 'categorie' => 'second_oeuvre', 'designation' => 'Volet roulant PVC manuel', 'prix_min' => 35000, 'prix_max' => 50000, 'puissance' => 'PVC', 'unite' => 'm²'],
            ['code' => 'volet_motorise', 'categorie' => 'second_oeuvre', 'designation' => 'Volet roulant alu motorisé', 'prix_min' => 55000, 'prix_max' => 80000, 'puissance' => 'Alu', 'unite' => 'm²'],
            ['code' => 'volet_centralise', 'categorie' => 'second_oeuvre', 'designation' => 'Volet motorisé centralisé', 'prix_min' => 70000, 'prix_max' => 100000, 'puissance' => 'Centr.', 'unite' => 'm²'],
            ['code' => 'volet_connecte', 'categorie' => 'second_oeuvre', 'designation' => 'Volet motorisé connecté', 'prix_min' => 85000, 'prix_max' => 120000, 'puissance' => 'Connect.', 'unite' => 'm²'],

            // CITERNE EAU DE PLUIE
            ['code' => 'citerne_5m3', 'categorie' => 'exterieur', 'designation' => 'Citerne enterrée 5m3', 'prix_min' => 800000, 'prix_max' => 1200000, 'puissance' => '5 000L', 'unite' => 'Forf.'],
            ['code' => 'citerne_10m3', 'categorie' => 'exterieur', 'designation' => 'Citerne enterrée 10m3 + pompe', 'prix_min' => 1400000, 'prix_max' => 2000000, 'puissance' => '10 000L', 'unite' => 'Forf.'],
            ['code' => 'citerne_20m3', 'categorie' => 'exterieur', 'designation' => 'Citerne enterrée 20m3 complète', 'prix_min' => 2500000, 'prix_max' => 3500000, 'puissance' => '20 000L', 'unite' => 'Forf.'],
        ];

        foreach ($options as $option) {
            \App\Models\EquipementOption::updateOrCreate(['code' => $option['code']], $option);
        }
    }
}
