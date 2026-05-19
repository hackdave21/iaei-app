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
        Schema::table('type_batiments', function (Blueprint $table) {
            if (!Schema::hasColumn('type_batiments', 'prix_base_m2')) {
                $table->decimal('prix_base_m2', 15, 2)->nullable();
            }
            if (!Schema::hasColumn('type_batiments', 'niveaux_max')) {
                $table->integer('niveaux_max')->nullable();
            }
            if (!Schema::hasColumn('type_batiments', 'ratio_surface')) {
                $table->decimal('ratio_surface', 8, 2)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('type_batiments', function (Blueprint $table) {
            $table->dropColumn(['prix_base_m2', 'niveaux_max', 'ratio_surface']);
        });
    }
};
