<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    use HasFactory;

    protected $table = "ots";
    // El dateformat es para los timestamp
    protected $dateformat = "d-m-Y H:i:s";

    protected $fillable = [
        'numero',
        'fecha_alta',
        'cliente_id',
        'estado_id',
        'entrega_hotel',
        'recibe_hotel',
        'entrega_lavanderia',
        'recibe_lavanderia',
        'lavado_formula',
        'lavado_real',
        'observaciones'
    ];

    public function estado() {
        return $this->belongsTo(Estado::class, 'estado_id','id')->withDefault();
    }

    public function estados() {
        return $this->belongsToMany(Estado::class, 'estado_ot','ot_id','estado_id')
                ->withPivot('orden_planchado','fecha','hora_inicio', 'hora_final');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id','id')->withDefault();
    }

}
