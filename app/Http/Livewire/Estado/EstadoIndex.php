<?php

namespace App\Http\Livewire\Estado;

use App\Models\Estado;
use Livewire\Component;

class EstadoIndex extends Component
{
    public $search;
    public $sort = 'descripcion';
    public $direction = 'asc';

    public $open_edit = false;
    public $estado;

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    protected $rules = [
        'estado.descripcion' => 'required|max:100|min:3',
        'estado.detalle' => 'max:100|min:3',
    ];

    public function mount() {
        // $this->estado = new Estado();
    }

    public function render()
    {
        $rows = Estado::where('descripcion', 'like', '%' . $this->search . '%')
                        ->orWhere ('detalle', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();

        return view('livewire.estado.estado-index', compact('rows'));
    }

    public function order($sort) {

        if($this->sort == $sort) {
            if($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Estado $row) {
        $this->estado = $row;

        $this->open_edit = true;
    }

    public function update() {
        // $this->validate([
        //     'estado.descripcion' => 'required|min:3|max:100',
        //     'estado.detalle' => 'required|min:3|max:100',
        // ]);

        $this->validate();

        $this->estado->save();

        // $this->reset(['openEdit','estado.descripcion','estado.detalle']);
        $this->reset(['open_edit']);

        // El evento solo lo escucha el componente "show-posts"
        // $this->emitTo('estado.estado-index', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El Estado se creo correctamente');
    }
}
