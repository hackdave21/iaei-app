<?php

namespace App\Services;

use App\Models\Standing;
use App\Models\EquipementOption;

class EstimationService
{
    public function calculate(array $inputs)
    {
        $standing = Standing::where('code', $inputs['standing'])->firstOrFail();
        $surfaceBatie = $inputs['surface_batie'];
        
        // 1. Coût de Construction (Poste 1)
        $constMin = $surfaceBatie * $standing->prix_m2_min;
        $constMax = $surfaceBatie * $standing->prix_m2_max;

        // 2. Équipements (Postes 2-12)
        // Pour l'instant, on simule une liste d'IDs d'options
        $optionsRaw = EquipementOption::whereIn('id', $inputs['option_ids'] ?? [])->get();
        
        $equipMin = $optionsRaw->sum('prix_min');
        $equipMax = $optionsRaw->sum('prix_max');

        // Total HT (Travaux)
        $totalTravauxMin = $constMin + $equipMin;
        $totalTravauxMax = $constMax + $equipMax;

        // Marge AIAE
        $margeAIAEMin = $totalTravauxMin * $standing->marge;
        $margeAIAEMax = $totalTravauxMax * $standing->marge;

        // Total Client (TTC hors taxes locales si applicables)
        $totalClientMin = $totalTravauxMin + $margeAIAEMin;
        $totalClientMax = $totalTravauxMax + $margeAIAEMax;

        return [
            'overview' => [
                'total_client_min' => $totalClientMin,
                'total_client_max' => $totalClientMax,
                'marge_aiae_min' => $margeAIAEMin,
                'marge_aiae_max' => $margeAIAEMax,
            ],
            'breakdown' => [
                'construction' => ['min' => $constMin, 'max' => $constMax],
                'equipements' => ['min' => $equipMin, 'max' => $equipMax],
            ]
        ];
    }
}
