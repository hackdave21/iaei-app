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
        Schema::create('agricultural_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_type_id')->constrained('sector_types')->onDelete('cascade');
            $table->string('name'); // Tomate serre
            $table->integer('cycle_duration_days');
            $table->decimal('yield_per_unit', 10, 2); // kg/m2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultural_models');
    }
};
