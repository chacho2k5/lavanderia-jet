<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    use HasFactory;

    protected $table = "ots";
    protected $fillable = [
        'numero',
        'fecha_alta',
        'cliente_id',
        'estado_id',
        'entrega_hotel',
        'recibe_hotel',
        'entrega_lavanderia',
        'recibe_lavanderia',
        'observaciones'
    ];

}
