<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_fut', 20)->unique(); // Ej: FUT-2026-001
            $table->string('dni_solicitante', 8);
            $table->string('nombres_solicitante', 100);
            $table->string('tipo_solicitud', 100); // Ej: Certificado de Estudios, Constancia, etc.
            $table->text('motivo');
            $table->enum('estado', ['PENDIENTE', 'EN_PROCESO', 'APROBADO', 'RECHAZADO'])->default('PENDIENTE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};