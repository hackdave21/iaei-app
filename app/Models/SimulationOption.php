<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SimulationOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'simulation_id',
        'option_id',
        'quantity',
        'snapshotted_price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'snapshotted_price' => 'decimal:2',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
