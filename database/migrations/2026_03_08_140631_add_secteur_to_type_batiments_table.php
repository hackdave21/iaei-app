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
            $table->string('secteur')->default('residentiel')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('type_batiments', function (Blueprint $table) {
            $table->dropColumn('secteur');
        });
    }
};
