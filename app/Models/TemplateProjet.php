<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateProjet extends Model
{
    protected $table = 'templates_projets';

    protected $fillable = [
        'code', 'nom', 'description', 'icone', 'secteur', 'type_batiment', 'standing', 'default_values', 'ordre_affichage', 'actif'
    ];

    protected $casts = [
        'default_values' => 'array',
        'actif' => 'boolean'
    ];
}
