<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 8)->unique();
            $table->string('nombres', 60);
            $table->string('apellidos', 60);
            $table->string('carrera', 100); // Ej: Diseño y Programación Web
            $table->enum('estado', ['INSCRITO', 'EVALUADO', 'ADMITIDO'])->default('INSCRITO');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postulantes');
    }
};