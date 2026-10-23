<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_fut',
        'dni_solicitante',
        'nombres_solicitante',
        'tipo_solicitud',
        'motivo',
        'estado',
    ];
}