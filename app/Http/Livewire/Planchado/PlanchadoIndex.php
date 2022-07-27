<?php

namespace App\Http\Livewire\Planchado;

use App\Models\Estado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PlanchadoIndex extends Component
{
    public $search;
    // public $sort = 'fecha_alta';
    public $sort = 'fecha_alta';
    public $direction = 'asc';
    public $readyToLoad = false;

    // Conjunto de datos
    // public Estado $registros;
    public $registros;
    public $registro_id;

    public $estados;
    public $estado_id, $estado_nombre, $estado_nombre_anterior;
    public $selectedEstado;

    // Datos para el alta
    // public $descripcion, $detalle;

    // Habilita / Deshabilita el modal
    public $open_modal = false;

    public $readOnly = null;

    public $aux = 0;
    public $action;      // edit - show
    public $titulo_modal = "Crear nuevo ESTADO";

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    // protected $rules = [
    //     'descripcion' => 'required|max:100|min:3',
    //     'detalle' => 'required|max:100|min:2',
    // ];

    // protected $messages = [
    //     'descripcion.required' => 'Debe ingresar un Estado',
    //     'descripcion.min' => 'El Estado debe tener entre 3 y 10 caracteres',
    //     'descripcion.max' => 'El Estado debe tener entre 3 y 10 caracteres',
    //     'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
    //     'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
    //     // 'invitation.email.unique.invitations' => 'The email has already been invited.',
    //     // 'invitation.email.unique.users' => 'An account with this email has already been registered.',
    // ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function mount() {
        // $this->registros = new Estado();
        $this->estados = Estado::orderBy('orden', 'asc')
            ->get();
    }

    public function render()
    {
        // $this->registros = Ot::orderBy($this->sort, $this->direction)
        //         ->get();
        $this->registros = DB::table('ots')
            ->join('estados','ots.estado_id','estados.id')
            ->join('clientes','ots.cliente_id','clientes.id')
            ->select('ots.*','clientes.razonsocial as razonsocial','estados.descripcion as estado_nombre','estados.orden as estado_orden')
            ->orderBy($this->sort, $this->direction)
            ->get();

            // dd($this->registros);

        // $this->registros = Estado::where('descripcion', 'like', '%' . $this->search . '%')
        //         ->orWhere('detalle', 'like', '%' . $this->search . '%')
        //         ->orderBy($this->sort, $this->direction)
        //         ->get();

        // if (count($this->registros)) {
        //     $auxId = $this->registros->first()->value('id');
        // } else {
        //     $auxId = 0;
        // }

        return view('livewire.planchado.planchado-index');

    }

    // public function updated($fields)
    // {
    //     $this->validateOnly($fields,[
    //         'descripcion' => 'required|max:100|min:3',
    //         'detalle' => 'required|max:100|min:3',
    //     ]);
    // }

    public function loadModelo() {
        $this->readyToLoad = true;
    }

    public function sumar_estado($id, $orden) {

        $rows = DB::table('ots')
            ->where('id', $id)
            ->update(['estado_id' => (int) $orden + 1]);
    }

    public function edit_show($id, $value) {

        if ($value == 'edit') {
            $this->titulo_modal = "Actualizar ESTADO";
        } else {
            $this->titulo_modal = "Detalle OT";
        }

        $this->reset(['estado_id','estado_nombre','selectedEstado']);

        $reg = $this->registros->where('id', $id)->first();

        $this->registro_id = $reg['id'];
        $this->estado_nombre_anterior = $reg['estado_nombre'];
        $newOrden = (int) $reg['estado_orden'] + 1;

        // Esto capaz lo puedo hacer buscando dentro del $this->registros
        $aux = Estado::where('orden', $newOrden)->first();
        $this->estado_id = $aux['id'];
        $this->nombre_estado = $aux['descripcion'];
        $this->selectedEstado = $aux['id'];

        $this->action = $value;
        $this->open_modal = true;

        // // $newOrden = Estado::where('orden', $ordenAux)->get('id');
        // // dd($newOrden);
        // // $this->selectedEstado = (int) $reg->estado->orden + 1;

        // $this->estado_nombre_anterior = $estado;
        // $newOrden = (int) $orden + 1;
        // $newEstado = Estado::where('orden', $newOrden)->first();
        // // dd($newEstado);

        // $this->estado_id = $newEstado->id;
        // $this->nombre_estado = $newEstado->descripcion;

        // $this->selectedEstado = $this->estado_id;

        // // $ordenAux = (int) $reg->estado->orden + 1;
        // // $newOrden = Estado::where('orden', $ordenAux)->get('id');
        // // dd($newOrden);
        // // $this->selectedEstado = (int) $reg->estado->orden + 1;

    }

    public function grabar() {
    // Grabo las modificaciones y las altas

        // $this->validate([
        //         'descripcion' => 'required|min:3|max:10',
        //         'detalle' => 'min:3|max:6',
        //     ]);

        // $this->validate();

        $rows = DB::table('ots')
              ->where('id', $this->registro_id)
              ->update(['estado_id' => $this->selectedEstado]);

        // Ot::upd (['id' => $this->registro_id],
        // [
        //     'descripcion' => $this->descripcion,
        //     'detalle' => $this->detalle,
        // ]);

        $this->cancel();

        // El evento solo lo escucha el componente "show-posts"
    //     // $this->emitTo('estado.estado-index', 'render');

    //     // El evento "alert" lo escucha todo el mundo
    //     // $this->emit('alert','El Estado se creo correctamente');

    }

    // public function delete($id) {

    //     Estado::destroy($id);
    // }

    public function cancel()
    {
        $this->reset(['estado_id','estado_nombre','selectedEstado','open_modal','titulo_modal']);

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
    // public function render()
    // {
    //     return view('livewire.cambiarestado.cambiar-estado-index');
    // }
}
