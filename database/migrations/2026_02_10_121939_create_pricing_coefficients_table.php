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
        Schema::create('pricing_coefficients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_type_id')->nullable()->constrained('sector_types')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('value', 8, 4); // Multiplicateur (ex: 1.1000)
            $table->boolean('is_global')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_coefficients');
    }
};
