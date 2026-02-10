<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Simulation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reference_id',
        'user_id',
        'sector_type_id',
        'lead_id',
        'input_quantity',
        'base_amount',
        'options_amount',
        'coefficient_modifier',
        'total_amount_ht',
        'tax_amount',
        'total_amount_ttc',
        'status',
        'configuration_data',
    ];

    protected $casts = [
        'configuration_data' => 'array',
        'input_quantity' => 'decimal:2',
        'base_amount' => 'decimal:2',
        'options_amount' => 'decimal:2',
        'coefficient_modifier' => 'decimal:2',
        'total_amount_ht' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount_ttc' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sectorType(): BelongsTo
    {
        return $this->belongsTo(SectorType::class);
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function simulationOptions(): HasMany
    {
        return $this->hasMany(SimulationOption::class);
    }

    public function result(): HasOne
    {
        return $this->hasOne(SimulationResult::class);
    }

    public function energySolution(): HasOne
    {
        return $this->hasOne(EnergySolution::class);
    }

    public function energyRoiCalculation(): HasOne
    {
        return $this->hasOne(EnergyRoiCalculation::class);
    }

    public function agriculturalRoi(): HasOne
    {
        return $this->hasOne(AgriculturalRoi::class);
    }

    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class);
    }
}
