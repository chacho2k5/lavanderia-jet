<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'apellido',
        'nombres',
        'numero_documento',
        'telefono',
        'correo'
    ];
}
