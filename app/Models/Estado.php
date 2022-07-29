<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'descripcion',
        'detalle',
        'orden',
        'accion'
    ];

    // public function ots() {
    //     return $this->hasMany(Ot::class);
    // }

    public function ots() {
        return $this->belongsToMany(Ot::class, 'estado_ot', 'estado_id', 'ot_id')
                ->withPivot('orden_planchado','fecha','hora_inicio', 'hora_final',);
    }

}
