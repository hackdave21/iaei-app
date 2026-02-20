<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    protected $fillable = [
        'name', 'code', 'prix_m2_min', 'prix_m2_max', 'emprise_max', 'hsp', 'terrain_min', 'niveaux_max', 'marge'
    ];
}
