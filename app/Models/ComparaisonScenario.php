<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComparaisonScenario extends Model
{
    protected $fillable = ['comparaison_id', 'simulation_id', 'label', 'ordre', 'est_reference'];

    protected $casts = [
        'est_reference' => 'boolean',
    ];

    public function comparaison()
    {
        return $this->belongsTo(Comparaison::class);
    }

    public function simulation()
    {
        return $this->belongsTo(SimulationSauvegardee::class, 'simulation_id');
    }
}
