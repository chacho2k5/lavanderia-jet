<?php

namespace App\Http\Livewire\Cambiarestado;

use App\Models\Estado;
use App\Models\EstadoOt;
use App\Models\Ot;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CambiarEstadoIndex extends Component
{
    public $search;
    public $sort = 'fecha_alta';
    public $direction = 'asc';
    public $readyToLoad = false;

    // Conjunto de datos
    public $registros;
    public $registro_id;

    public $estados;
    public $estado_id, $estado_nombre, $estado_nombre_anterior;
    public $selectedEstado;

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

    public function mount() {
        $this->estados = Estado::orderBy('orden', 'asc')
            ->get();
    }

    public function render()
    {
        $this->registros = DB::table('ots')
            ->join('estados','ots.estado_id','estados.id')
            ->join('clientes','ots.cliente_id','clientes.id')
            ->select('ots.*','clientes.razonsocial as razonsocial','estados.id as id_estado','estados.descripcion as estado_nombre','estados.orden as estado_orden')
            ->orderBy($this->sort, $this->direction)
            ->get();

        // dd($this->registros);

        return view('livewire.cambiarestado.cambiar-estado-index');

    }

    public function loadModelo() {
        $this->readyToLoad = true;
    }

    public function sumar_estado($id, $orden) {
    //
    // Cambia al estado con el orden inmediato superior
    // . Cargo la "hora_final" del estado actual
    // . Agrego el nuevo estado en "estado_ot"
    //
        // Actualizo el campo "estado_id" en la tabla "ots"
        // $rows = DB::table('ots')
        //     ->where('id', $id)
        //     ->update(['estado_id' => (int) $orden + 1]);

        // Obtengo el "id" del estado que corresponde al "orden + 1" del estado
        $aux = Estado::where('orden', (int) $orden + 1)
                ->first();

        // Actualizo el campo "estado_id" en la tabla "ots"
        Ot::where('id', $id)
            ->update(['estado_id' => $aux->id]);

        // Cargo la "hora_final" para el evento que se cierra
        EstadoOt::where('ot_id', $id)
            ->where('estado_id', $this->registros->id_estado)
            ->update(['hora_final' => date("H:i:s")]);

        // Cargo el nuevo estado para la OT seleccionada
        EstadoOt::Create([
            'ot_id' => $id,
            'estado_id' => $aux->id,
            'orden' => '0',
            'lavado' => false,
            'fecha' => date('Y-m-d'),
            'hora_inicio' => date("H:i:s"),
            // 'hora_final'
            ]);
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

    }

    public function grabar() {
    // Grabo las modificaciones y las altas

        $rows = DB::table('ots')
              ->where('id', $this->registro_id)
              ->update(['estado_id' => $this->selectedEstado]);

        $this->limpiarControles();

        // El evento solo lo escucha el componente "show-posts"
    //     // $this->emitTo('estado.estado-index', 'render');

    //     // El evento "alert" lo escucha todo el mundo
    //     // $this->emit('alert','El Estado se creo correctamente');

    }

    // public function delete($id) {

    //     Estado::destroy($id);
    // }

    public function limpiarControles()
    {
        $this->reset(['estado_id','estado_nombre','selectedEstado','open_modal','titulo_modal']);

    }

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

}
