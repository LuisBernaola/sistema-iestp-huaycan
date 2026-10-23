<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_estudiante',
        'nombres_estudiante',
        'carrera',
        'ciclo',
        'estado',
    ];
}