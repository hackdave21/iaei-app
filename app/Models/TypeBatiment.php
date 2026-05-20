<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeBatiment extends Model
{
    protected $fillable = ['secteur', 'code', 'nom', 'icone', 'description', 'prix_base_m2', 'niveaux_max', 'ratio_surface'];
}
