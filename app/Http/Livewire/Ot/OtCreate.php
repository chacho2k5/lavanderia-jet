<?php

namespace App\Http\Livewire\Ot;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\OtCuerpoTmp;
use Illuminate\Support\Facades\Validator;

class OtCreate extends Component
{
    public $clientes, $selectedCliente, $cliente;
    public $dirCliente;

    public $articulos, $selectedArticulo;

    public $numero, $fecha_alta, $cliente_id, $estado_id, $entrega_hotel, $recibe_hotel;
    public $entrega_lavanderia, $recibe_lavanderia, $observaciones;

    public $prendas, $prenda, $retira, $entrega, $articulo_id;
    public $otCuerpo;

    public $error = null;

    protected $listeners = ['render'];

    public function mount() {
        $this->estado_id = 1;   // esto esta dibujado, dpes hay q poner el combo
        $this->otCuerpo = OtCuerpoTmp::all();
        $this->clientes = Cliente::all();
        $this->articulos = Articulo::all();
        $this->selectedArticulo = 0;
        $this->retira = '';
    }

    public function updatedselectedCliente($value)
    {
        $cliente = Cliente::where('id', $value)->first();
        $this->dirCliente = $cliente->calle_nombre . ' Nº ' . $cliente->calle_numero;
        $this->cliente_id = $cliente->id;

        // $this->clientes = Cliente::where('id', $value)->get();
        // $this->dirCliente = $this->clientes->first()->id ?? null;

        // $cliente = Cliente::where('id', $value)->first('razonsocial');

        // $this->dirCliente = json_encode($this->dirCliente);
        // $this->dirCliente = 'puta direccion';
    }

    // public function updatedselectedArticulo($value)
    // {
    //     $prendas = Articulo::where('id', $value)->first();
    //     $this->prenda = $prendas->descripcion;
    //     $this->articulo_id = $prendas->id;
    // }

    public function render()
    {
        return view('livewire.ot.ot-create');
    }

    public function grabar()
    {

    }

    public function cargarOtCuerpo() {

        // $this->validate([
        //     'numero' => 'required',
        // ]);
        // $this->validate();

        // $validateData = Validator::make(
        //     ['numero' => 'required'],
        //     ['retira' => 'required']
        // )->validate();

        // if ($this->numero == null)
        // {
        //     $this->error = "Debe ingresar el Nro. de OT";
        // }

        $this->validate([
            'numero' => 'required|numeric',
        ]);
        // $this->validate();

        OtCuerpoTmp::create([
           'numero' => $this->numero,
           'articulo_id' => $this->articulo_id,
           'prenda' => $this->prenda,
           'retira' => $this->retira,
           'entrega' => $this->entrega,
        ]);

        $this->reset(['selectedArticulo', 'retira']);

        // El evento solo lo escucha el componente "show-posts"
        // $this->emitTo('ot.ot-table-tmp', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El post se creo correctamente');

    }
}

