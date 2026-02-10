<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgriculturalModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_type_id',
        'name',
        'cycle_duration_days',
        'yield_per_unit',
    ];

    protected $casts = [
        'cycle_duration_days' => 'integer',
        'yield_per_unit' => 'decimal:2',
    ];

    public function sectorType(): BelongsTo
    {
        return $this->belongsTo(SectorType::class);
    }

    public function costs(): HasMany
    {
        return $this->hasMany(AgriculturalCost::class);
    }
}
 