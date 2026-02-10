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
        Schema::create('agricultural_rois', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_id')->constrained()->onDelete('cascade');
            $table->foreignId('agricultural_model_id')->constrained('agricultural_models');
            $table->integer('cycles_per_year');
            $table->decimal('estimated_production_yearly', 12, 2);
            $table->decimal('estimated_revenue_yearly', 15, 2);
            $table->decimal('estimated_opex_yearly', 15, 2);
            $table->decimal('profit_margin_percent', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultural_rois');
    }
};
