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
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kriteria
            $table->enum('type', ['maximization', 'minimization']); // Tipe kriteria, misalnya maksimalisasi
            $table->decimal('weight', 5, 2); // Bobot kepentingan untuk kriteria ini
            $table->string('preference_type')->nullable(); // Tipe preferensi PROMETHEE, jika dibutuhkan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias');
    }
};
