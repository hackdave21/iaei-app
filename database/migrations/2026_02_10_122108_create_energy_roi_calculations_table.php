<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('energy_roi_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_id')->constrained()->onDelete('cascade');
            $table->decimal('initial_investment', 15, 2);
            $table->decimal('monthly_savings', 15, 2);
            $table->decimal('yearly_savings', 15, 2);
            $table->decimal('roi_years', 5, 2);
            $table->decimal('co2_saved_tons', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energy_roi_calculations');
    }
};
