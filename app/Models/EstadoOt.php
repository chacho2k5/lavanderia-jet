<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOt extends Model
{
    use HasFactory;
    protected $table = 'estado_ot';
    // El dateformat es para los timestamp
    protected $dateformat = "d-m-Y H:i:s";

    protected $fillable = [
        'ot_id',
        'estado_id',
        'orden',
        'lavado',
        'fecha',
        'hora_inicio',
        'hora_final',
    ];
}
