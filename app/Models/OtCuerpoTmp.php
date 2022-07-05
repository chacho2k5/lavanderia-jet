<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtCuerpoTmp extends Model
{
    use HasFactory;

    protected $table = "ots_cuerpo_tmp";
    protected $fillable = [
        'ot_numero',
        'articulo_id',
        'prenda',
        'retira',
        'entrega'
    ];
}
