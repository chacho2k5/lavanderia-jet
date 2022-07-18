<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Articulo;

class Articulos extends Component
{
    //definir una variable de la tabla 
    public $articulos;

    public function render()
    {
        //llamamos a todos los registros
        $this->articulos = Articulo::all();
        return view('livewire.articulo.index');
    }
}
