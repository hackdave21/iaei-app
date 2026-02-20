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
        Schema::create('simulations_sauvegardees', function (Blueprint $table) {
            $table->id();
            $table->string('code_reprise')->unique();
            $table->string('token')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('email')->nullable();
            $table->enum('mode', ['express', 'expert'])->default('expert');
            $table->tinyInteger('etape_actuelle')->default(1);
            $table->json('donnees_simulation');
            $table->json('resultat_estimation')->nullable();
            $table->boolean('est_complete')->default(false);
            $table->timestamp('expire_at');
            $table->timestamps();

            $table->index('code_reprise');
            $table->index('token');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulation_sauvegardees');
    }
};
