<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipementOption extends Model
{
    protected $fillable = [
        'code', 'categorie', 'designation', 'unite', 'taille_puissance', 'prix_min', 'prix_max', 'description', 'mapping_standings', 'ordre_affichage', 'actif'
    ];

    protected $casts = [
        'mapping_standings' => 'array',
        'actif' => 'boolean',
    ];
}
