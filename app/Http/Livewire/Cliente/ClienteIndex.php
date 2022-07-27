<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteIndex extends Component
{


    use WithPagination;

    public $search;
    public $sort = 'razonsocial';
    public $direction = 'asc';
    public $readyToLoad = false;

    // Conjunto de datos
    // public Estado $registros;
    public $registros;

    // Datos para el alta
    public $registro_id, $razonsocial, $contacto, $cuit, $iva_id,$telefono1;
    public $telefono2, $correo, $calle_nombre, $calle_numero , $codigo_postal;
    public $fecha_alta, $observaciones;

    // Datos para la modificacion
    public $open_modal = false;

    public $readOnly = null;

    public $aux = 0;
    public $action;      // edit - show
    public $titulo_modal = "Crear nuevo Cliente";

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    protected $rules = [
       'razonsocial' => 'required|max:100|min:3',
      //  'detalle' => 'required|max:100|min:2',
    ];

    protected $messages = [
        'razonsocial.required' => 'Debe ingresar una Razon Social',
        'razonsocial.min' =>  'la Razon Social debe tener entre 3 y 100 caracteres',
      //  'descripcion.max' => 'El Estado debe tener entre 3 y 10 caracteres',
      //  'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
      //  'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
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
        $this->registros = Cliente:: where('razonsocial', 'like', '%' . $this->search . '%')
                ->orWhere('cuit', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->get();

        return view('livewire.cliente.cliente-index',[
            'registros' => Cliente::paginate(10)
        ]);

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
            'razonsocial' => 'required|max:100|min:3',
         //   'detalle' => 'required|max:100|min:3',
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
            $this->titulo_modal = "Actualizar Cliente";
        } else {
            $this->titulo_modal = "Cliente";
        }

        $reg = Cliente::findOrFail($id);
        $this->razonsocial = $reg->razonsocial;
        $this->contacto = $reg->contacto;
        $this->cuit = $reg->cuit;
        $this->iva_id = $reg->iva_id;
        $this->telefono1 = $reg->telefono1;
        $this->telefono2 = $reg->telefono2;
        $this->correo = $reg->correo;
        $this->calle_nombre = $reg->calle_nombre;
        $this->calle_numero = $reg->calle_numero;
        $this->codigo_postal = $reg->codigo_postal;
        $this->fecha_alta = $reg->fecha_alta;
        $this->observaciones = $reg->observaciones;


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

        Cliente::updateOrCreate(['id' => $this->registro_id],
        [
           // 'descripcion' => $this->descripcion,
          //  'detalle' => $this->detalle,


            'razonsocial'=> $this->razonsocial,
            'contacto' => $this->contacto,
            'cuit' => $this->cuit,
            'iva_id' => $this->iva_id,
            'telefono1' => $this->telefono1,
            'telefono2' => $this->telefono2,
            'correo' => $this->correo,
            'calle_nombre' => $this->calle_nombre,
            'calle_numero' => $this->calle_numero,
            'codigo_postal' => $this->codigo_postal,
            'fecha_alta' => $this->fecha_alta,
            'observaciones' => $this->observaciones,
    

            
        ]);

        $this->cancel();

        // El evento solo lo escucha el componente "show-posts"
    //     // $this->emitTo('estado.estado-index', 'render');

    //     // El evento "alert" lo escucha todo el mundo
    //     // $this->emit('alert','El Estado se creo correctamente');

    }

    public function delete($id) {

        Cliente::destroy($id);
    }

    public function cancel()
    {
        $this->reset(['registro_id', 'razonsocial', 'contacto', 'cuit', 'iva_id','telefono1',
        'telefono2', 'correo', 'calle_nombre', 'calle_numero' , 'codigo_postal',
        'fecha_alta', 'observaciones','open_modal', 'titulo_modal']);
        

    }

}
