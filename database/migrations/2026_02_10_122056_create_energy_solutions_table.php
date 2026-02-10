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
        Schema::create('energy_solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_id')->constrained()->onDelete('cascade');
            $table->decimal('daily_consumption_kwh', 10, 2);
            $table->decimal('peak_power_kw', 10, 2);
            $table->integer('autonomy_hours');
            $table->decimal('recommended_solar_capacity', 10, 2);
            $table->decimal('recommended_storage_capacity', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energy_solutions');
    }
};
