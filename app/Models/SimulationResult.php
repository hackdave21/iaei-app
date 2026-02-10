<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SimulationResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'simulation_id',
        'result_data',
        'pdf_path',
        'generated_at',
    ];

    protected $casts = [
        'result_data' => 'array',
        'generated_at' => 'datetime',
    ];

    public function simulation(): BelongsTo
    {
        return $this->belongsTo(Simulation::class);
    }
}
