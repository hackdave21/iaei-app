<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricingRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_type_id',
        'base_unit_price',
        'currency_code',
        'valid_from',
        'valid_until',
    ];

    protected $casts = [
        'base_unit_price' => 'decimal:2',
        'valid_from' => 'date',
        'valid_until' => 'date',
    ];

    public function sectorType(): BelongsTo
    {
        return $this->belongsTo(SectorType::class);
    }
}
