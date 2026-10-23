<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('dni_persona', 8);
            $table->string('nombres_persona', 100);
            $table->string('concepto', 100); // Ej: Derecho de Examen, Matrícula
            $table->string('nro_operacion', 50)->unique();
            $table->decimal('monto', 8, 2);
            $table->enum('estado', ['PENDIENTE', 'VALIDADO', 'OBSERVADO'])->default('PENDIENTE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};