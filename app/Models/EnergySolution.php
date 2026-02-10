<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnergySolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'simulation_id',
        'daily_consumption_kwh',
        'peak_power_kw',
        'autonomy_hours',
        'recommended_solar_capacity',
        'recommended_storage_capacity',
    ];

    protected $casts = [
        'daily_consumption_kwh' => 'decimal:2',
        'peak_power_kw' => 'decimal:2',
        'autonomy_hours' => 'integer',
        'recommended_solar_capacity' => 'decimal:2',
        'recommended_storage_capacity' => 'decimal:2',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }
}
