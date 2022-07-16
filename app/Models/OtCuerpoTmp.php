<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtCuerpoTmp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "ots_cuerpo_tmp";
    protected $fillable = [
        'ot_id',
        'numero',
        'articulo_id',
        'prenda',
        'retira',
        'entrega'
    ];
}
