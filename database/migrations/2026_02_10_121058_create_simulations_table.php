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
        Schema::create('simulations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->unique(); // SIM-2023-XYZ
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('sector_type_id')->constrained('sector_types');
            $table->foreignId('lead_id')->nullable()->constrained()->onDelete('set null');
            
            // Données financières snapshots
            $table->decimal('input_quantity', 10, 2); // m2, kW, etc.
            $table->decimal('base_amount', 15, 2);
            $table->decimal('options_amount', 15, 2)->default(0);
            $table->decimal('coefficient_modifier', 5, 2)->default(1.00);
            $table->decimal('total_amount_ht', 15, 2);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('total_amount_ttc', 15, 2);
            
            $table->string('status')->default('draft');
            $table->json('configuration_data')->nullable(); // Snapshot complet des inputs
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulations');
    }
};
