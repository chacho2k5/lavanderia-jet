<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class Categorias extends Component
{
    public $categorias;
    public $descripcion, $factor;
    public $modal = false;

    public function render()
    {
        $this->categorias = Categoria::all();

        return view('livewire.categorias');
    }

    public function create()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }


    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = true;
    }

    public function limpiarCampos() {
        $this->descripcion = '';
        $this->factor = '';
    }
}
