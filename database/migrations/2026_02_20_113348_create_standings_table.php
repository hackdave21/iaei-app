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
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('prix_m2_min');
            $table->integer('prix_m2_max');
            $table->integer('emprise_max'); // percentage
            $table->decimal('hsp', 4, 2); // Hauteur Sous Plafond
            $table->integer('terrain_min');
            $table->integer('niveaux_max');
            $table->decimal('marge', 5, 2); // 0.17 to 0.27
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standings');
    }
};
