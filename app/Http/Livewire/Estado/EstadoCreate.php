<?php

namespace App\Http\Livewire\Estado;

use App\Models\Estado;
use Livewire\Component;

class EstadoCreate extends Component
{

    public $open = false;
    public $descripcion, $detalle;

    // Esto del "rules" no funciono
    protected $rules = [
        // 'descripcion' => 'required|max:100|min:3',
        // 'detalle' => 'max:100|min:3',
        'descripcion' => 'required',
            'detalle' => 'nullable',
    ];

    protected $messages = [
        'descripcion.required' => 'Debe ingresar el nombre del Estado.',
        'descripcion.max:100' => 'El nombre del Estado debe tener entre 3 y 100 caracteres.',
        'descripcion.min:3' => 'El nombre del Estado debe tener entre 3 y 100 caracteres.'
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName,[
    //         'descripcion' => 'required|max:100|min:3',
    //         'detalle' => 'max:100|min:3'
    //     ]);
    // }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function save() {

        // $this->validate([
        //     // 'descripcion' => 'required|max:100|min:3',
        //     // 'detalle' => 'max:100|min:3',
        //     'descripcion' => 'required',
        //     'detalle' => 'nullable',
        // ]);

        $this->validate();

        Estado::create([
            'descripcion' => $this->descripcion,
            'detalle' => $this->detalle,
        ]);

        $this->reset(['open','descripcion','detalle']);

        // El evento solo lo escucha el componente "show-posts"
        $this->emitTo('estado.estado-index', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El Estado se creo correctamente');
    }

    public function cancelar()
    {
        $this->reset(['open','descripcion','detalle']);
    }

    public function render()
    {
        return view('livewire.estado.estado-create');
    }
}
