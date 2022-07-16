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
    public $modelo;
    public $readyToLoad = false;

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    protected $rules = [
        'modelo.descripcion' => 'required|max:100|min:3',
        'modelo.detalle' => 'max:100|min:3',
    ];

    public function mount() {
        $this->modelo = new Estado();
    }

    // public function updatingSearch() {
    //     $this->resetPage();
    // }

    public function render()
    {
        if ($this->readyToLoad) {
            $rows = Estado::where('descripcion', 'like', '%' . $this->search . '%')
                    ->orWhere('detalle', 'like', '%' . $this->search . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->get();
        } else {
            $rows=[];
        }

        return view('livewire.estado.estado-index', compact('rows'));
    }

    public function loadModelo() {
        $this->readyToLoad = true;
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
        $this->modelo = $row;

        $this->open_edit = true;
    }

    public function update() {
        // $this->validate([
        //     'modelo.descripcion' => 'required|min:3|max:100',
        //     'modelo.detalle' => 'required|min:3|max:100',
        // ]);

        $this->validate();

        $this->modelo->save();

        // $this->reset(['openEdit','modelo.descripcion','modelo.detalle']);
        $this->reset(['open_edit']);

        // El evento solo lo escucha el componente "show-posts"
        // $this->emitTo('estado.estado-index', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El Estado se creo correctamente');
    }

    public function delete($id) {
        Estado::destroy($id);
    }
}
