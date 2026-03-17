<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnergyCalculatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nettoyage avant seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('zones_irradiation')->truncate();
        DB::table('equipements_energie')->truncate();
        DB::table('tarifs_ceet')->truncate();
        DB::table('cheptel_biogaz')->truncate();
        DB::table('taux_collecte')->truncate();
        DB::table('digesteurs_forfaits')->truncate();
        DB::table('groupes_biogaz')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Zones Irradiation
        DB::table('zones_irradiation')->insert([
            ['zone_code' => 'grand_lome', 'zone_nom' => 'Zone 1 — Grand Lomé', 'ghi_kwh_m2_jour' => 4.40, 'hsp_heures' => 4.0, 'source' => 'Amou et al. 2010'],
            ['zone_code' => 'maritime', 'zone_nom' => 'Zone 2 — Maritime', 'ghi_kwh_m2_jour' => 4.60, 'hsp_heures' => 4.1, 'source' => 'Interpolation'],
            ['zone_code' => 'plateaux', 'zone_nom' => 'Zone 3 — Plateaux', 'ghi_kwh_m2_jour' => 4.80, 'hsp_heures' => 4.3, 'source' => 'Amou et al. 2010'],
            ['zone_code' => 'centrale', 'zone_nom' => 'Zone 4 — Centrale', 'ghi_kwh_m2_jour' => 5.10, 'hsp_heures' => 4.6, 'source' => 'Interpolation'],
            ['zone_code' => 'kara_savanes', 'zone_nom' => 'Zone 5 — Kara & Savanes', 'ghi_kwh_m2_jour' => 5.45, 'hsp_heures' => 4.9, 'source' => 'Amou et al. 2010'],
        ]);

        // 2. Équipements Énergie
        DB::table('equipements_energie')->insert([
            // Résidentiel
            ['code' => 'led_res', 'categorie' => 'residentiel', 'designation' => 'Éclairage LED (pièce)', 'puissance_watts' => 15, 'usage_heures_jour' => 6.0, 'kwh_jour' => 0.09, 'coef_demarrage' => 1.0],
            ['code' => 'ventilo_res', 'categorie' => 'residentiel', 'designation' => 'Ventilateur plafond', 'puissance_watts' => 75, 'usage_heures_jour' => 10.0, 'kwh_jour' => 0.75, 'coef_demarrage' => 1.2],
            ['code' => 'tv_res', 'categorie' => 'residentiel', 'designation' => 'Téléviseur LED', 'puissance_watts' => 100, 'usage_heures_jour' => 5.0, 'kwh_jour' => 0.50, 'coef_demarrage' => 1.0],
            ['code' => 'frigo_res', 'categorie' => 'residentiel', 'designation' => 'Réfrigérateur', 'puissance_watts' => 150, 'usage_heures_jour' => 12.0, 'kwh_jour' => 1.80, 'coef_demarrage' => 3.0],
            ['code' => 'congel_res', 'categorie' => 'residentiel', 'designation' => 'Congélateur', 'puissance_watts' => 200, 'usage_heures_jour' => 12.0, 'kwh_jour' => 2.40, 'coef_demarrage' => 3.0],
            ['code' => 'clim_1cv', 'categorie' => 'residentiel', 'designation' => 'Climatiseur split 1 CV', 'puissance_watts' => 1200, 'usage_heures_jour' => 8.0, 'kwh_jour' => 9.60, 'coef_demarrage' => 3.5],
            ['code' => 'clim_1_5cv', 'categorie' => 'residentiel', 'designation' => 'Climatiseur split 1,5 CV', 'puissance_watts' => 1500, 'usage_heures_jour' => 8.0, 'kwh_jour' => 12.00, 'coef_demarrage' => 3.5],
            ['code' => 'clim_2cv', 'categorie' => 'residentiel', 'designation' => 'Climatiseur split 2 CV', 'puissance_watts' => 1800, 'usage_heures_jour' => 8.0, 'kwh_jour' => 14.40, 'coef_demarrage' => 3.5],
            ['code' => 'chauffe_eau', 'categorie' => 'residentiel', 'designation' => 'Chauffe-eau électrique', 'puissance_watts' => 2000, 'usage_heures_jour' => 2.0, 'kwh_jour' => 4.00, 'coef_demarrage' => 1.0],
            ['code' => 'machine_laver', 'categorie' => 'residentiel', 'designation' => 'Machine à laver', 'puissance_watts' => 2000, 'usage_heures_jour' => 1.0, 'kwh_jour' => 2.00, 'coef_demarrage' => 3.0],
            ['code' => 'fer_repasser', 'categorie' => 'residentiel', 'designation' => 'Fer à repasser', 'puissance_watts' => 1500, 'usage_heures_jour' => 0.5, 'kwh_jour' => 0.75, 'coef_demarrage' => 1.0],
            ['code' => 'pompe_eau', 'categorie' => 'residentiel', 'designation' => 'Pompe à eau', 'puissance_watts' => 750, 'usage_heures_jour' => 3.0, 'kwh_jour' => 2.25, 'coef_demarrage' => 4.0],
            ['code' => 'ordi_desktop', 'categorie' => 'residentiel', 'designation' => 'Ordinateur + écran', 'puissance_watts' => 200, 'usage_heures_jour' => 6.0, 'kwh_jour' => 1.20, 'coef_demarrage' => 1.0],
            ['code' => 'routeur_wifi', 'categorie' => 'residentiel', 'designation' => 'Routeur WiFi', 'puissance_watts' => 15, 'usage_heures_jour' => 24.0, 'kwh_jour' => 0.36, 'coef_demarrage' => 1.0],
            
            // Tertiaire / C&I
            ['code' => 'poste_bureau', 'categorie' => 'tertiaire', 'designation' => 'Poste de travail bureau', 'puissance_watts' => 250, 'usage_heures_jour' => 9.0, 'kwh_jour' => 2.25, 'coef_demarrage' => 1.2],
            ['code' => 'eclairage_bur', 'categorie' => 'tertiaire', 'designation' => 'Éclairage bureau (10 m²)', 'puissance_watts' => 50, 'usage_heures_jour' => 10.0, 'kwh_jour' => 0.50, 'coef_demarrage' => 1.0],
            ['code' => 'clim_bur', 'categorie' => 'tertiaire', 'designation' => 'Climatisation bureau (20 m²)', 'puissance_watts' => 2500, 'usage_heures_jour' => 9.0, 'kwh_jour' => 22.50, 'coef_demarrage' => 3.0],
            ['code' => 'serveur_baie', 'categorie' => 'tertiaire', 'designation' => 'Serveur / baie informatique', 'puissance_watts' => 1500, 'usage_heures_jour' => 24.0, 'kwh_jour' => 36.00, 'coef_demarrage' => 1.5],
            
            // Agricole
            ['code' => 'pompe_irrig', 'categorie' => 'agricole', 'designation' => 'Pompe d\'irrigation (m³/h)', 'puissance_watts' => 1000, 'usage_heures_jour' => 6.0, 'kwh_jour' => 6.00, 'coef_demarrage' => 3.0],
            ['code' => 'ventil_volaille', 'categorie' => 'agricole', 'designation' => 'Ventilation volailles (100 m²)', 'puissance_watts' => 500, 'usage_heures_jour' => 12.0, 'kwh_jour' => 6.00, 'coef_demarrage' => 2.0],
        ]);

        // 3. Tarifs CEET
        DB::table('tarifs_ceet')->insert([
            ['categorie' => 'domestique_social_1', 'tranche_debut_kwh' => 0, 'tranche_fin_kwh' => 30, 'prix_fcfa_kwh' => 60, 'date_debut' => '2025-05-15'],
            ['categorie' => 'domestique_social_2', 'tranche_debut_kwh' => 31, 'tranche_fin_kwh' => 120, 'prix_fcfa_kwh' => 93, 'date_debut' => '2025-05-15'],
            ['categorie' => 'domestique_social_3', 'tranche_debut_kwh' => 121, 'tranche_fin_kwh' => NULL, 'prix_fcfa_kwh' => 130, 'date_debut' => '2025-05-15'],
            ['categorie' => 'domestique_standard', 'tranche_debut_kwh' => 0, 'tranche_fin_kwh' => NULL, 'prix_fcfa_kwh' => 115, 'date_debut' => '2025-05-15'],
            ['categorie' => 'professionnel_bt', 'tranche_debut_kwh' => 0, 'tranche_fin_kwh' => NULL, 'prix_fcfa_kwh' => 115, 'date_debut' => '2025-05-15'],
            ['categorie' => 'moyenne_tension', 'tranche_debut_kwh' => 0, 'tranche_fin_kwh' => NULL, 'prix_fcfa_kwh' => 100, 'date_debut' => '2025-05-15'],
        ]);

        // 4. Cheptel Biogaz
        DB::table('cheptel_biogaz')->insert([
            ['code' => 'bovin_local', 'type_animal' => 'Bovin local (Zébu, N\'Dama)', 'unite' => '1 tête', 'fumier_kg_jour' => 18.0, 'biogaz_m3_jour' => 0.55, 'methane_pct' => 58.0, 'kwh_elec_jour' => 1.10, 'cn_ratio' => '25-30:1', 'observations' => 'Race locale Togo'],
            ['code' => 'bovin_ameliore', 'type_animal' => 'Bovin amélioré (croisé, Holstein)', 'unite' => '1 tête', 'fumier_kg_jour' => 28.0, 'biogaz_m3_jour' => 0.90, 'methane_pct' => 62.0, 'kwh_elec_jour' => 1.80, 'cn_ratio' => '25-30:1', 'observations' => 'Race importée/croisée'],
            ['code' => 'ovin_caprin', 'type_animal' => 'Ovin / Caprin', 'unite' => '1 tête', 'fumier_kg_jour' => 2.5, 'biogaz_m3_jour' => 0.075, 'methane_pct' => 57.5, 'kwh_elec_jour' => 0.15, 'cn_ratio' => '20-25:1', 'observations' => 'Faible production unitaire'],
            ['code' => 'porc', 'type_animal' => 'Porc', 'unite' => '1 tête', 'fumier_kg_jour' => 6.5, 'biogaz_m3_jour' => 0.40, 'methane_pct' => 65.0, 'kwh_elec_jour' => 0.80, 'cn_ratio' => '15-20:1', 'observations' => 'Bon rendement, déjections liquides'],
            ['code' => 'volaille_100', 'type_animal' => 'Volailles (lot 100)', 'unite' => '100 têtes', 'fumier_kg_jour' => 10.0, 'biogaz_m3_jour' => 0.425, 'methane_pct' => 57.5, 'kwh_elec_jour' => 0.85, 'cn_ratio' => '8-12:1', 'observations' => 'Co-digestion OBLIGATOIRE, C/N faible'],
        ]);

        // 5. Taux de Collecte
        DB::table('taux_collecte')->insert([
            ['code' => 'intensif', 'systeme' => 'Intensif (stabulation permanente)', 'taux' => 0.80, 'description' => 'Collecte quasi totale 24/7'],
            ['code' => 'semi_intensif', 'systeme' => 'Semi-intensif (pâturage + étable)', 'taux' => 0.50, 'description' => 'Système courant au Togo'],
            ['code' => 'extensif', 'systeme' => 'Extensif (pâturage libre)', 'taux' => 0.30, 'description' => 'Collecte enclos nuit uniquement'],
        ]);

        // 6. Digesteurs Forfaits
        DB::table('digesteurs_forfaits')->insert([
            ['code' => 'dome_petit', 'type_digesteur' => 'Dôme fixe béton', 'volume_m3_min' => 6, 'volume_m3_max' => 10, 'prix_min' => 2500000, 'prix_max' => 4000000, 'duree_vie_ans' => 20, 'observations' => '10-20 bovins, technologie éprouvée'],
            ['code' => 'dome_moyen', 'type_digesteur' => 'Dôme fixe béton', 'volume_m3_min' => 15, 'volume_m3_max' => 25, 'prix_min' => 5000000, 'prix_max' => 8000000, 'duree_vie_ans' => 20, 'observations' => '20-50 bovins'],
            ['code' => 'dome_grand', 'type_digesteur' => 'Dôme fixe béton', 'volume_m3_min' => 30, 'volume_m3_max' => 50, 'prix_min' => 9000000, 'prix_max' => 15000000, 'duree_vie_ans' => 20, 'observations' => '50-100 bovins, semi-industriel'],
            ['code' => 'poche_souple', 'type_digesteur' => 'Poche HDPE', 'volume_m3_min' => 10, 'volume_m3_max' => 30, 'prix_min' => 1500000, 'prix_max' => 3000000, 'duree_vie_ans' => 10, 'observations' => 'Moins cher, durée limitée'],
            ['code' => 'conteneurise', 'type_digesteur' => 'Container 40ft', 'volume_m3_min' => 32, 'volume_m3_max' => 32, 'prix_min' => 15000000, 'prix_max' => 25000000, 'duree_vie_ans' => 15, 'observations' => 'Déploiement rapide, T° contrôlée'],
        ]);

        // 7. Groupes Biogaz
        DB::table('groupes_biogaz')->insert([
            ['code' => 'biogaz_10kwe', 'puissance_kwe' => 10, 'prix_min' => 8000000, 'prix_max' => 12000000, 'conso_biogaz_m3_h' => 5.0, 'cheptel_min_bovins' => 20, 'observations' => 'Ferme familiale élargie'],
            ['code' => 'biogaz_20kwe', 'puissance_kwe' => 20, 'prix_min' => 14000000, 'prix_max' => 20000000, 'conso_biogaz_m3_h' => 9.0, 'cheptel_min_bovins' => 40, 'observations' => 'Ferme semi-industrielle'],
            ['code' => 'biogaz_50kwe', 'puissance_kwe' => 50, 'prix_min' => 30000000, 'prix_max' => 45000000, 'conso_biogaz_m3_h' => 22.0, 'cheptel_min_bovins' => 100, 'observations' => 'Ferme industrielle'],
            ['code' => 'biogaz_100kwe', 'puissance_kwe' => 100, 'prix_min' => 55000000, 'prix_max' => 80000000, 'conso_biogaz_m3_h' => 42.0, 'cheptel_min_bovins' => 200, 'observations' => 'Grande exploitation + co-substrats'],
        ]);
    }
}
