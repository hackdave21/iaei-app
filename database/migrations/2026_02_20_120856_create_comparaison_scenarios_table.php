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
        Schema::create('comparaison_scenarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comparaison_id')->constrained('comparaisons')->onDelete('cascade');
            $table->foreignId('simulation_id')->constrained('simulations_sauvegardees')->onDelete('cascade');
            $table->string('label')->nullable();
            $table->tinyInteger('ordre')->default(0);
            $table->boolean('est_reference')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comparaison_scenarios');
    }
};
