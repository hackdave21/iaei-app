<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sol extends Model
{
    protected $fillable = [
        'code', 'nom', 'coefficient', 'prix_fondation_m2', 'description', 'alerte'
    ];

    protected $casts = [
        'alerte' => 'boolean'
    ];
}
