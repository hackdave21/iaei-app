<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationSauvegardee extends Model
{
    protected $table = 'simulations_sauvegardees';

    protected $fillable = [
        'code_reprise', 'token', 'user_id', 'email', 'mode', 'etape_actuelle', 'donnees_simulation', 'resultat_estimation', 'est_complete', 'expire_at'
    ];

    protected $casts = [
        'donnees_simulation' => 'array',
        'resultat_estimation' => 'array',
        'est_complete' => 'boolean',
        'expire_at' => 'datetime'
    ];
}
