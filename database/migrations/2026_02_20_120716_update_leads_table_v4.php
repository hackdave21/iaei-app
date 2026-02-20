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
            $table->enum('type_demande', ['rappel', 'devis', 'rdv', 'info'])->default('rappel')->after('phone');
            $table->string('type_projet')->nullable()->after('type_demande');
            $table->text('description_projet')->nullable()->after('type_projet');
            $table->decimal('budget_estime', 15, 2)->nullable()->after('description_projet');
            $table->text('message')->nullable()->after('budget_estime');
            $table->json('donnees_simulation_snapshot')->nullable()->after('notes');
            $table->timestamp('contacte_at')->nullable()->after('donnees_simulation_snapshot');
            $table->foreignId('traite_par')->nullable()->after('contacte_at')->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            //
        });
    }
};
