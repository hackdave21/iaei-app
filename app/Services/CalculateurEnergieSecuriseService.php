<?php

namespace App\Services;

class CalculateurEnergieSecuriseService
{
    protected $energieService;

    public function __construct(EnergieService $energieService)
    {
        $this->energieService = $energieService;
    }

    /**
     * Calcule une estimation complète et sécurisée
     */
    public function genererEstimation(array $input)
    {
        $inventaire = $input['inventaire'] ?? [];
        $zoneCode = $input['zone'] ?? 'grand_lome';
        $mode = $input['mode'] ?? 'solaire';

        // 1. Calcul du bilan technique
        $bilan = $this->energieService->calculerBilan($inventaire);
        
        $resultats = [
            'bilan' => $bilan,
            'recommandations' => []
        ];

        // 2. Dimensionnement technique
        if ($mode === 'solaire' || $mode === 'hybride') {
            $solaire = $this->energieService->dimensionnerSolaire(
                $bilan['total_conso_kwh_jour'], 
                $bilan['puissance_pointe_w'], 
                $zoneCode
            );
            
            // Estimation financière opaque
            $prixSolaire = $this->estimerPrixSolaire($solaire['panneaux_kwc'], $solaire['batteries_kwh']);
            
            $resultats['recommandations']['solaire'] = array_merge($solaire, $prixSolaire);
        }

        if ($mode === 'groupe' || $mode === 'hybride') {
            $groupe = $this->energieService->dimensionnerGroupe(
                $bilan['puissance_pointe_w'],
                ($mode === 'groupe' ? 'autonome' : 'backup')
            );
            
            // Estimation financière opaque
            $prixGroupe = $this->estimerPrixGroupe($groupe['puissance_kva']);
            
            $resultats['recommandations']['groupe'] = array_merge($groupe, $prixGroupe);
        }

        // 3. Calcul ROI
        $totMin = ($resultats['recommandations']['solaire']['prix_min'] ?? 0) + ($resultats['recommandations']['groupe']['prix_min'] ?? 0);
        $totMax = ($resultats['recommandations']['solaire']['prix_max'] ?? 0) + ($resultats['recommandations']['groupe']['prix_max'] ?? 0);
        
        $roi = $this->energieService->calculerROI($bilan['total_conso_kwh_jour'], ($totMin + $totMax) / 2);
        $resultats['financier'] = $roi;

        return $resultats;
    }

    /**
     * Estime le prix solaire sans exposer le détail interne
     */
    protected function estimerPrixSolaire($kwc, $kwh)
    {
        $pricing = config('aiae_energy_pricing.solar_kits');
        
        // Logique de sélection du kit le plus proche ou calcul linéaire pondéré
        // Pour cet exemple, on fait un calcul linéaire basé sur les kits du config
        $refKit = $pricing['kit_5kw'];
        $ratio = $kwc / ($refKit['puissance_wc'] / 1000);
        
        $prixMin = $refKit['prix_min'] * $ratio * 0.95;
        $prixMax = $refKit['prix_max'] * $ratio * 1.05;

        return [
            'prix_min' => round($prixMin),
            'prix_max' => round($prixMax),
            'monnaie' => 'FCFA'
        ];
    }

    /**
     * Estime le prix du groupe
     */
    protected function estimerPrixGroupe($kva)
    {
        $pricing = config('aiae_energy_pricing.generators');
        
        // Sélection simple par palier
        $prixMin = 0; $prixMax = 0;
        
        if ($kva <= 10) { $p = $pricing['diesel_10kva']; }
        elseif ($kva <= 25) { $p = $pricing['diesel_20kva']; }
        else { $p = $pricing['diesel_45kva']; }
        
        $prixMin = $p['prix_min'] * ($kva / ($kva <= 10 ? 10 : ($kva <= 25 ? 20 : 45)));
        $prixMax = $p['prix_max'] * ($kva / ($kva <= 10 ? 10 : ($kva <= 25 ? 20 : 45)));

        return [
            'prix_min' => round($prixMin),
            'prix_max' => round($prixMax),
            'monnaie' => 'FCFA'
        ];
    }

    /**
     * Estimation Biogaz sécurisée
     */
    public function genererEstimationBiogaz(array $cheptel, $collecte)
    {
        $technique = $this->energieService->dimensionnerBiogaz($cheptel, $collecte);
        
        // Ajout prix opaque
        $prixDigesteur = [
            'min' => $technique['digesteur_recommande']->prix_min ?? 0,
            'max' => $technique['digesteur_recommande']->prix_max ?? 0
        ];
        
        $prixGroupe = [
            'min' => $technique['groupe_recommande']->prix_min ?? 0,
            'max' => $technique['groupe_recommande']->prix_max ?? 0
        ];

        return [
            'technique' => $technique,
            'financier' => [
                'investissement_min' => $prixDigesteur['min'] + $prixGroupe['min'],
                'investissement_max' => $prixDigesteur['max'] + $prixGroupe['max'],
                'economie_annuelle_estimee' => $technique['potentiel_elec_journalier_kwh'] * 365 * 115
            ]
        ];
    }
}
