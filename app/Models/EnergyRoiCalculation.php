<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnergyRoiCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'simulation_id',
        'initial_investment',
        'monthly_savings',
        'yearly_savings',
        'roi_years',
        'co2_saved_tons',
    ];

    protected $casts = [
        'initial_investment' => 'decimal:2',
        'monthly_savings' => 'decimal:2',
        'yearly_savings' => 'decimal:2',
        'roi_years' => 'decimal:2',
        'co2_saved_tons' => 'decimal:2',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }
}
