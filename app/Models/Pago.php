<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_persona',
        'nombres_persona',
        'concepto',
        'nro_operacion',
        'monto',
        'estado',
    ];
}