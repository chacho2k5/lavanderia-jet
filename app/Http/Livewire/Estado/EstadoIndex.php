<?php

namespace App\Http\Livewire\Estado;

use App\Models\Estado;
use Livewire\Component;

class EstadoIndex extends Component
{
    public $search;
    public $sort = 'descripcion';
    public $direction = 'asc';
    public $readyToLoad = false;

    // Conjunto de datos
    // public Estado $registros;
    public $registros;

    // Datos para el alta
    public $registro_id, $descripcion, $detalle;

    // Datos para la modificacion
    public $open_modal = false;

    public $readOnly = null;

    public $aux = 0;
    public $action;      // edit - show
    public $titulo_modal = "Crear nuevo ESTADO";

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    protected $rules = [
        'descripcion' => 'required|max:100|min:3',
        'detalle' => 'required|max:100|min:2',
    ];

    protected $messages = [
        'descripcion.required' => 'Debe ingresar un Estado',
        'descripcion.min' => 'El Estado debe tener entre 3 y 10 caracteres',
        'descripcion.max' => 'El Estado debe tener entre 3 y 10 caracteres',
        'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
        'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
        // 'invitation.email.unique.invitations' => 'The email has already been invited.',
        // 'invitation.email.unique.users' => 'An account with this email has already been registered.',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function mount() {
        // $this->registros = new Estado();
    }

    public function render()
    {
        $this->registros = Estado::where('descripcion', 'like', '%' . $this->search . '%')
                ->orWhere('detalle', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->get();

        return view('livewire.estado.estado-index');

        // if ($this->readyToLoad) {
        //     $rows = Estado::where('descripcion', 'like', '%' . $this->search . '%')
        //             ->orWhere('detalle', 'like', '%' . $this->search . '%')
        //             ->orderBy($this->sort, $this->direction)
        //             ->get();
        // } else {
        //     $rows=[];
        // }
        // return view('livewire.estado.estado-index', compact('rows'));
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'descripcion' => 'required|max:100|min:3',
            'detalle' => 'required|max:100|min:3',
        ]);
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

    public function edit_show($id, $value) {
    // Muestro el modal, uso el mismo para el Ver/editar.
    // Defino y el titulo y asigno los valores de los campos con las variables del reg. seleccionado.

        if ($value == 'edit') {
            $this->titulo_modal = "Actualizar ESTADO";
        } else {
            $this->titulo_modal = "ESTADO";
        }

        $reg = Estado::findOrFail($id);
        $this->registro_id = $reg->id;
        $this->descripcion = $reg->descripcion;
        $this->detalle = $reg->detalle;

        $this->action = $value;
        $this->open_modal = true;
    }

    public function create() {
    // Muestro el modal para el Alta
        $this->cancel();
        $this->action = 'create';
        $this->open_modal = true;

    }

    public function grabar() {
    // Grabo las modificaciones y las altas

        // $this->validate([
        //         'descripcion' => 'required|min:3|max:10',
        //         'detalle' => 'min:3|max:6',
        //     ]);

        $this->validate();

        Estado::updateOrCreate(['id' => $this->registro_id],
        [
            'descripcion' => $this->descripcion,
            'detalle' => $this->detalle,
        ]);

        $this->cancel();

        // El evento solo lo escucha el componente "show-posts"
    //     // $this->emitTo('estado.estado-index', 'render');

    //     // El evento "alert" lo escucha todo el mundo
    //     // $this->emit('alert','El Estado se creo correctamente');

    }

    public function delete($id) {

        Estado::destroy($id);
    }

    public function cancel()
    {
        $this->reset(['registro_id','descripcion','detalle', 'open_modal', 'titulo_modal']);

    }

}
