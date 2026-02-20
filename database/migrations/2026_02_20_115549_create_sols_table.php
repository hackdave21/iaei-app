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
        Schema::create('sols', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nom');
            $table->decimal('coefficient', 4, 2)->default(1.00);
            $table->integer('prix_fondation_m2')->default(25000);
            $table->text('description')->nullable();
            $table->boolean('alerte')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sols', function (Blueprint $table) {
            //
        });
    }
};
