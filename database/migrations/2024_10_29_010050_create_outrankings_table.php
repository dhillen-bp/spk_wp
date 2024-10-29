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
        Schema::create('outrankings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_1_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('employee_2_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained('criteria')->onDelete('cascade');
            $table->decimal('preference_value', 8, 2); // Hasil preferensi untuk pasangan karyawan pada kriteria ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outrankings');
    }
};
