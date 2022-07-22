<?php

namespace App\Http\Livewire\Ot;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Ot;
use App\Models\OtCuerpo;
use Livewire\Component;

class OtIndex extends Component
{
    // public $ots = [];
    public $filas;
    public $headerOt;       // Cabecera OT
    public $rowsOt;         // Cuerpo OT

    public $aux;
    public $formula;

    // Filtro
    public $clientes;
    public $fecha_alta, $numero, $selectedCliente;

    public function mount() {
        // $clientes = Cliente::with('Iva')->select('clientes.*');
        // $apple = Holding::whereRelation('stock', 'ticker', 'AAPL')->get();
        $this->clientes = Cliente::select('id','razonsocial','calle_nombre', 'calle_numero')
                            ->orderBy('razonsocial', 'asc')
                            ->get();

        $this->headerOt = Ot::select('id','fecha_alta','numero','cliente_id','estado_id','entrega_hotel','recibe_hotel','entrega_lavanderia','recibe_lavanderia')
                ->orderBy('fecha_alta','asc')
                ->get();

        if (count($this->headerOt)) {
            $auxId = $this->headerOt->first()->value('id');
        } else {
            $auxId = 0;
        }

        // $this->rowsOt = OtCuerpo::where('ot_id', $auxId)
        //             ->select('id', 'ot_id', 'articulo_id', 'retira', 'entrega')
        //             ->get();
    }

    public function render()
    {
        return view('livewire.ot.ot-index');
    }

    public function updatedselectedCliente($value)
    {
        if ($value ==! null) {
            $cliente = Cliente::where('id', $value)->first();
            $this->dirCliente = $cliente->calle_nombre . ' Nº ' . $cliente->calle_numero;
            $this->cliente_id = $cliente->id;
        }
     }

    // public function selectedOt($id) {
    //     $this->rowsOt = OtCuerpo::where('ot_id', $id)
    //                 ->select('id', 'ot_id', 'articulo_id', 'retira', 'entrega')
    //                 ->get();

    //     // $this->aux = $this->rowsOt->articulo->categoria->descripcion;
    //     // $this->aux = $this->rowsOt->first()->articulo->categoria->descripcion;
    // }


}
