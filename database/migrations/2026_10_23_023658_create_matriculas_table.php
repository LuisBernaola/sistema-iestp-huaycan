<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('dni_estudiante', 8);
            $table->string('nombres_estudiante', 100);
            $table->string('carrera', 100);
            $table->string('ciclo', 20); // Ej: I Ciclo, II Ciclo, etc.
            $table->enum('estado', ['MATRICULADO', 'RETIRADO', 'EGRESADO'])->default('MATRICULADO');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};