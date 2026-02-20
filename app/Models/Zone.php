<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'code', 'nom', 'coefficient', 'profondeur_forage', 'prix_foncier_m2', 'description'
    ];
}
