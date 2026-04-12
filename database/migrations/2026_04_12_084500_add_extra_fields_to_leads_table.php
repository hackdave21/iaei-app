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
        Schema::table('leads', function (Blueprint $table) {
            $table->string('pays_residence')->nullable()->after('email');
            $table->string('delai_souhaite')->nullable()->after('type_projet');
            $table->string('localisation_projet')->nullable()->after('description_projet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['pays_residence', 'delai_souhaite', 'localisation_projet']);
        });
    }
};
