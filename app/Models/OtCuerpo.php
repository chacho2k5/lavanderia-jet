<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtCuerpo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "ots_cuerpo";
    protected $fillable = [
        'ot_id',
        'articulo_id',
        'retira',
        'entrega',
        'factor',
        'lavado_formula'
    ];

    public function articulo() {
        return $this->belongsTo(Articulo::class, 'articulo_id','id')->withDefault();
    }
}
