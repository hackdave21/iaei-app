<?php

namespace App\Services;

use App\Models\Standing;
use App\Models\EquipementOption;

class DeductionService
{
    /**
     * Sélectionne automatiquement les équipements recommandés ou présélectionnés
     * par défaut pour un standing donné.
     */
    public function suggestOptions(string $standingCode)
    {
        $allOptions = EquipementOption::where('actif', true)->get();
        $suggestedIds = [];

        foreach ($allOptions as $option) {
            $mapping = $option->mapping_standings;
            if (isset($mapping[$standingCode])) {
                if (in_array($mapping[$standingCode], ['recommande', 'preselect'])) {
                    $suggestedIds[] = $option->id;
                }
            }
        }

        return $suggestedIds;
    }
}
