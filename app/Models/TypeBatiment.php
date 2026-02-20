<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeBatiment extends Model
{
    protected $fillable = ['code', 'nom', 'icone', 'description'];
}
