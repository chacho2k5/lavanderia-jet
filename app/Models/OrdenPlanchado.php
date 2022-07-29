<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenPlanchado extends Model
{
    use HasFactory;

    protected $table = "orden_planchados";
    protected $dateformat = "d-m-Y H:i:s";

    protected $fillable = [
        'ot_id',
        'orden_planchado',
        'lavado_formula',
        'fecha',
        'hora_inicio',
        'hora_final',
    ];

}
