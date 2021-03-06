<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model


{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'categoria_id',
        'delicado'
    ];



public function categoria() {
    return $this->belongsTo(Categoria::class)->withDefault();
}


};
