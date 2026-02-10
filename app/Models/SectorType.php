<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SectorType extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'name',
        'slug',
        'base_price_mode',
        'description',
    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function simulations(): HasMany
    {
        return $this->hasMany(Simulation::class);
    }

    public function pricingRules(): HasMany
    {
        return $this->hasMany(PricingRule::class);
    }

    public function pricingCoefficients(): HasMany
    {
        return $this->hasMany(PricingCoefficient::class);
    }

    public function optionCategories(): HasMany
    {
        return $this->hasMany(OptionCategory::class);
    }

    public function agriculturalModels(): HasMany
    {
        return $this->hasMany(AgriculturalModel::class);
    }
}
