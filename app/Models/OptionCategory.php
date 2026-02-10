<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OptionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_type_id',
        'name',
        'is_required',
        'selection_mode',
    ];

    protected $casts = [
        'is_required' => 'boolean',
    ];

    public function sectorType(): BelongsTo
    {
        return $this->belongsTo(SectorType::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
