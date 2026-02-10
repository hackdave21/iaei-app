<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgriculturalRoi extends Model
{
    use HasFactory;

    protected $table = 'agricultural_rois';

    protected $fillable = [
        'simulation_id',
        'agricultural_model_id',
        'cycles_per_year',
        'estimated_production_yearly',
        'estimated_revenue_yearly',
        'estimated_opex_yearly',
        'profit_margin_percent',
    ];

    protected $casts = [
        'cycles_per_year' => 'integer',
        'estimated_production_yearly' => 'decimal:2',
        'estimated_revenue_yearly' => 'decimal:2',
        'estimated_opex_yearly' => 'decimal:2',
        'profit_margin_percent' => 'decimal:2',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function agriculturalModel(): BelongsTo
    {
        return $this->belongsTo(AgriculturalModel::class);
    }
}
