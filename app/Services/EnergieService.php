<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EnergieService
{
    /**
     * Calcule le bilan de puissance à partir d'un inventaire d'équipements
     * 
     * @param array $inventaire [['code' => '...', 'qty' => 1, 'heures' => 8], ...]
     * @return array
     */
    public function calculerBilan(array $inventaire)
    {
        $totalPuissanceW = 0;
        $totalConsoWhJour = 0;
        $puissancePointeW = 0;
        $details = [];

        foreach ($inventaire as $item) {
            $equipement = DB::table('equipements_energie')->where('code', $item['code'])->first();
            
            if ($equipement) {
                $qty = $item['qty'] ?? 1;
                $heures = $item['heures'] ?? $equipement->usage_heures_jour;
                
                $puissanceItem = $equipement->puissance_watts * $qty;
                $consoItem = $puissanceItem * $heures;
                
                $totalPuissanceW += $puissanceItem;
                $totalConsoWhJour += $consoItem;
                
                // On considère la puissance de pointe avec le coefficient de démarrage
                $puissancePointeW += ($equipement->puissance_watts * $equipement->coef_demarrage) * min($qty, 2); // Simultanéité simplifiée

                $details[] = [
                    'designation' => $equipement->designation,
                    'puissance_u' => $equipement->puissance_watts,
                    'qty' => $qty,
                    'heures' => $heures,
                    'conso_jour' => $consoItem
                ];
            }
        }

        return [
            'total_puissance_w' => $totalPuissanceW,
            'total_conso_kwh_jour' => $totalConsoWhJour / 1000,
            'puissance_pointe_w' => $puissancePointeW,
            'details' => $details
        ];
    }

    /**
     * Dimensionne un système solaire
     */
    public function dimensionnerSolaire($consoKwhJour, $puissanceMaxW, $zoneCode)
    {
        $zone = DB::table('zones_irradiation')->where('zone_code', $zoneCode)->first();
        $hsp = $zone ? $zone->hsp_heures : 4.0;
        
        // 1. Champ Solaire (kWc)
        // Formule: Conso / (HSP * Rendement)
        // Rendement système estimé à 0.75 (pertes onduleur, câbles, poussière, température)
        $rendement = 0.75;
        $puissanceCreteWc = ($consoKwhJour * 1000) / ($hsp * $rendement);
        
        // 2. Onduleur (kVA)
        // On prend la puissance max avec une marge de 20%
        $puissanceOnduleurKva = ceil(($puissanceMaxW * 1.2) / 1000);
        
        // 3. Batteries (kWh)
        // Autonomie: on vise 1.5 jours de conso ou 100% de la conso journalière pour la nuit + sécurité
        // DoD (Profondeur de décharge) Lithium = 80%
        $dod = 0.8;
        $autonomieJours = 1.2;
        $stockageUtileKwh = $consoKwhJour * $autonomieJours;
        $stockageNominalKwh = $stockageUtileKwh / $dod;

        return [
            'panneaux_kwc' => round($puissanceCreteWc / 1000, 2),
            'onduleur_kva' => max($puissanceOnduleurKva, 1),
            'batteries_kwh' => round($stockageNominalKwh, 1),
            'hsp_used' => $hsp
        ];
    }

    /**
     * Dimensionne un groupe électrogène
     */
    public function dimensionnerGroupe($puissanceMaxW, $mode = 'backup')
    {
        // En mode backup, on prend 100% de la pointe
        // En mode autonome, on prend 120-150% pour la longévité
        $facteur = ($mode === 'autonome') ? 1.5 : 1.2;
        $puissanceKva = ceil(($puissanceMaxW * $facteur) / 1000);
        
        // On arrondit aux standards du marché (5, 10, 15, 20, 30, 45, 60...)
        $standards = [1, 2, 3, 5, 7, 10, 15, 20, 30, 45, 60, 80, 100, 150, 200];
        $finalKva = $puissanceKva;
        foreach ($standards as $s) {
            if ($s >= $puissanceKva) {
                $finalKva = $s;
                break;
            }
        }

        return [
            'puissance_kva' => $finalKva,
            'mode' => $mode
        ];
    }

    /**
     * Calcule la rentabilité (ROI)
     */
    public function calculerROI($consoKwhJour, $prixSysteme, $tarifKwhCeet = 115)
    {
        $economieMensuelle = $consoKwhJour * 30 * $tarifKwhCeet;
        $economieAnnuelle = $economieMensuelle * 12;
        
        if ($economieAnnuelle <= 0) return 99;
        
        $roiAnnees = $prixSysteme / $economieAnnuelle;
        
        return [
            'economie_mensuelle' => round($economieMensuelle),
            'roi_annees' => round($roiAnnees, 1)
        ];
    }

    /**
     * Dimensionne un système Biogaz
     * 
     * @param array $cheptel [['code' => '...', 'nombre' => 10], ...]
     * @return array
     */
    public function dimensionnerBiogaz(array $cheptel, $collecteCode = 'semi_intensif')
    {
        $totalFumierKgJour = 0;
        $totalBiogazM3Jour = 0;
        $totalPotentielElecKwhJour = 0;
        
        $tauxCollecte = DB::table('taux_collecte')->where('code', $collecteCode)->value('taux') ?? 0.5;

        foreach ($cheptel as $item) {
            $animal = DB::table('cheptel_biogaz')->where('code', $item['code'])->first();
            if ($animal) {
                $nb = $item['nombre'] ?? 0;
                $fumier = $animal->fumier_kg_jour * $nb * $tauxCollecte;
                $biogaz = $animal->biogaz_m3_jour * $nb * $tauxCollecte;
                $elec = $animal->kwh_elec_jour * $nb * $tauxCollecte;
                
                $totalFumierKgJour += $fumier;
                $totalBiogazM3Jour += $biogaz;
                $totalPotentielElecKwhJour += $elec;
            }
        }

        // Dimensionnement Digesteur (Volume utile = Charge journalière * Temps de rétention)
        // Temps de rétention moyen au Togo (mésophile) = 40 à 50 jours
        $tempsRetention = 45;
        // Volume substrat (fumier + eau 1:1)
        $volumeJournalierM3 = ($totalFumierKgJour * 2) / 1000;
        $volumeDigesteurM3 = ceil($volumeJournalierM3 * $tempsRetention);
        
        // Sélection Digesteur Forfait
        $digesteur = DB::table('digesteurs_forfaits')
            ->where('volume_m3_min', '<=', $volumeDigesteurM3)
            ->where('volume_m3_max', '>=', $volumeDigesteurM3)
            ->first();
            
        if (!$digesteur) {
            $digesteur = DB::table('digesteurs_forfaits')->where('volume_m3_max', '<', $volumeDigesteurM3)->orderBy('volume_m3_max', 'desc')->first();
        }

        // Sélection Groupe Biogaz
        // Puissance électrique nécessaire (marche ~8h par jour sur le gaz accumulé)
        $puissanceNecessaireKwe = ($totalBiogazM3Jour / 8) / 0.5; // Basé sur conso 0.5 m3/h/kwe
        $groupe = DB::table('groupes_biogaz')
            ->where('puissance_kwe', '>=', $puissanceNecessaireKwe)
            ->orderBy('puissance_kwe', 'asc')
            ->first();

        return [
            'fumier_kg_jour' => round($totalFumierKgJour),
            'biogaz_m3_jour' => round($totalBiogazM3Jour, 1),
            'volume_digesteur_m3' => $volumeDigesteurM3,
            'digesteur_recommande' => $digesteur,
            'groupe_recommande' => $groupe,
            'potentiel_elec_journalier_kwh' => round($totalPotentielElecKwhJour, 1)
        ];
    }
}
