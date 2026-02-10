<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricingCoefficient extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_type_id',
        'name',
        'slug',
        'value',
        'is_global',
    ];

    protected $casts = [
        'value' => 'decimal:4',
        'is_global' => 'boolean',
    ];

    public function sectorType(): BelongsTo
    {
        return $this->belongsTo(SectorType::class);
    }

    public function scopeGlobal($query)
    {
        return $query->where('is_global', true);
    }
}
