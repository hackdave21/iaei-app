<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgriculturalCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'agricultural_model_id',
        'name',
        'cost_per_cycle_per_unit',
    ];

    protected $casts = [
        'cost_per_cycle_per_unit' => 'decimal:2',
    ];

    public function agriculturalModel(): BelongsTo
    {
        return $this->belongsTo(AgriculturalModel::class);
    }
}
