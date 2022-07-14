<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'descripcion'
    ];

    public function ots() {
        return $this->hasMany(Ot::class);
    }
}
