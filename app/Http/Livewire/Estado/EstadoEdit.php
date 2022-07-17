<?php

namespace App\Http\Livewire\Estado;

use App\Models\Estado;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;
use Illuminate\Http\Request;

class EstadoEdit extends Component
{
    public $estado;
    public $openEdit = false;

    public function mount(Estado $row) {
        $this->estado = $row;
    }

    protected $rules = [
        'estado.descripcion' => 'required|max:100|min:3',
        'estado.detalle' => 'max:100|min:3',
    ];

    public function save() {

        // $this->validate([
        //     'estado.descripcion' => 'required|min:3|max:100',
        //     'estado.detalle' => 'required|min:3|max:100',
        // ]);

        $this->validate();

        $this->estado->save();

        // $this->reset(['openEdit','estado.descripcion','estado.detalle']);
        $this->reset(['openEdit']);

        // El evento solo lo escucha el componente "show-posts"
        $this->emitTo('estado.estado-index', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El Estado se creo correctamente');
    }

    public function render()
    {
        return view('livewire.estado.estado-edit');
    }
}
