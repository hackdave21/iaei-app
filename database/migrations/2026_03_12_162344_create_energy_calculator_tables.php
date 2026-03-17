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
        // Table irradiation par zone
        Schema::create('zones_irradiation', function (Blueprint $table) {
            $table->id();
            $table->string('zone_code', 20)->unique();
            $table->string('zone_nom', 100);
            $table->decimal('ghi_kwh_m2_jour', 4, 2);
            $table->decimal('hsp_heures', 3, 1);
            $table->string('source', 200)->nullable();
            $table->timestamps();
        });

        // Table équipements types (bilan puissance)
        Schema::create('equipements_energie', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->enum('categorie', ['residentiel', 'tertiaire', 'industriel', 'agricole']);
            $table->string('designation', 200);
            $table->integer('puissance_watts');
            $table->decimal('usage_heures_jour', 4, 1);
            $table->decimal('kwh_jour', 6, 2);
            $table->decimal('coef_demarrage', 3, 1)->default(1.0);
            $table->text('observations')->nullable();
            $table->integer('ordre_affichage')->default(0);
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });

        // Table tarifs CEET (paramétrable)
        Schema::create('tarifs_ceet', function (Blueprint $table) {
            $table->id();
            $table->string('categorie', 50);
            $table->integer('tranche_debut_kwh')->default(0);
            $table->integer('tranche_fin_kwh')->nullable();
            $table->integer('prix_fcfa_kwh');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });

        // Table cheptel types (production biogaz)
        Schema::create('cheptel_biogaz', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('type_animal', 100);
            $table->string('unite', 20)->default('1 tête');
            $table->decimal('fumier_kg_jour', 5, 1);
            $table->decimal('biogaz_m3_jour', 5, 2);
            $table->decimal('methane_pct', 4, 1)->default(60.0);
            $table->decimal('kwh_elec_jour', 5, 2);
            $table->string('cn_ratio', 10)->nullable();
            $table->text('observations')->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });

        // Table taux de collecte fumier
        Schema::create('taux_collecte', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('systeme', 100);
            $table->decimal('taux', 3, 2);
            $table->text('description')->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });

        // Table forfaits digesteurs
        Schema::create('digesteurs_forfaits', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('type_digesteur', 50);
            $table->integer('volume_m3_min');
            $table->integer('volume_m3_max');
            $table->integer('prix_min');
            $table->integer('prix_max');
            $table->integer('duree_vie_ans')->nullable();
            $table->text('observations')->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });

        // Table groupes biogaz
        Schema::create('groupes_biogaz', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->integer('puissance_kwe');
            $table->integer('prix_min');
            $table->integer('prix_max');
            $table->decimal('conso_biogaz_m3_h', 4, 1);
            $table->integer('cheptel_min_bovins')->nullable();
            $table->text('observations')->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });

        // Table estimations énergie (sauvegarde)
        Schema::create('estimations_energie', function (Blueprint $table) {
            $table->id();
            $table->string('code_estimation', 20)->unique();
            $table->foreignId('simulation_id')->nullable()->constrained('simulations')->onDelete('set null');
            $table->string('type_batiment', 50)->nullable();
            $table->string('standing', 20)->nullable();
            $table->integer('surface_m2')->nullable();
            $table->string('zone_code', 20)->nullable();
            $table->boolean('raccorde_ceet')->default(true);
            
            // Résultats calculés
            $table->decimal('conso_brute_kwh_jour', 8, 2)->nullable();
            $table->decimal('conso_ajustee_kwh_jour', 8, 2)->nullable();
            $table->decimal('coef_simultaneite', 3, 2)->nullable();
            $table->decimal('puissance_crete_kwc', 6, 2)->nullable();
            $table->decimal('puissance_apparente_kva', 6, 2)->nullable();
            
            // Recommandations
            $table->string('kit_solaire_code', 50)->nullable();
            $table->string('groupe_code', 50)->nullable();
            $table->enum('mode_energie', ['solaire', 'groupe', 'hybride'])->nullable();
            $table->enum('mode_groupe', ['backup', 'autonome'])->nullable();
            
            // Financier
            $table->integer('prix_solaire_min')->nullable();
            $table->integer('prix_solaire_max')->nullable();
            $table->integer('prix_groupe_min')->nullable();
            $table->integer('prix_groupe_max')->nullable();
            $table->integer('production_mensuelle_kwh')->nullable();
            $table->integer('economie_mensuelle_ceet')->nullable();
            $table->decimal('roi_annees', 4, 1)->nullable();
            
            // Lead
            $table->string('email', 100)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->boolean('pdf_genere')->default(false);
            
            // Snapshot complet
            $table->json('bilan_puissance_json')->nullable();
            $table->json('resultats_json')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimations_energie');
        Schema::dropIfExists('groupes_biogaz');
        Schema::dropIfExists('digesteurs_forfaits');
        Schema::dropIfExists('taux_collecte');
        Schema::dropIfExists('cheptel_biogaz');
        Schema::dropIfExists('tarifs_ceet');
        Schema::dropIfExists('equipements_energie');
        Schema::dropIfExists('zones_irradiation');
    }
};
