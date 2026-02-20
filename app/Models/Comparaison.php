<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comparaison extends Model
{
    protected $fillable = ['code_comparaison', 'user_id', 'nom'];

    public function scenarios()
    {
        return $this->hasMany(ComparaisonScenario::class, 'comparaison_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
