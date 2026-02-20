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
        Schema::create('equipement_options', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('categorie');
            $table->string('designation');
            $table->string('unite')->default('Forf.');
            $table->string('puissance')->nullable();
            $table->integer('prix_min');
            $table->integer('prix_max');
            $table->text('description')->nullable();
            $table->json('mapping_standings')->nullable();
            $table->integer('ordre_affichage')->default(0);
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement_options');
    }
};
