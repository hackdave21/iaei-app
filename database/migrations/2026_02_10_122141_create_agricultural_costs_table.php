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
        Schema::create('agricultural_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agricultural_model_id')->constrained('agricultural_models')->onDelete('cascade');
            $table->string('name'); // Semences
            $table->decimal('cost_per_cycle_per_unit', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultural_costs');
    }
};
