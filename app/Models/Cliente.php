<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'razonsocial',
        'contacto',
        'cuit',
        'iva_id',
        'telefono1',
        'telefono2',
        'correo',
        'calle_nombre',
        'calle_numero',
        'codigo_postal',
        'barrio_id',
        'localidad_id',
        'provincia_id',
        'fecha_alta',
        'observaciones'
];

    // Usando withDefault(), evita que se rompa la relacion cuando no hay datos que se correspondan y asume un valor x defecto
    public function iva() {
        return $this->belongsTo(Iva::class)->withDefault();
    }

    public function barrio() {
        return $this->belongsTo(Barrio::class)->withDefault();
    }

    public function localidad() {
        return $this->belongsTo(Localidad::class)->withDefault();
    }

    public function provincia() {
        return $this->belongsTo(Provincia::class);
    }

}
