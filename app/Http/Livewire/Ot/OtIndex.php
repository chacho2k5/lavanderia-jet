<?php

namespace App\Http\Livewire\Ot;

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

    public function mount() {
        // $clientes = Cliente::with('Iva')->select('clientes.*');
        // $apple = Holding::whereRelation('stock', 'ticker', 'AAPL')->get();
        $this->headerOt = Ot::select('id','fecha_alta','numero','cliente_id','estado_id','entrega_hotel','recibe_hotel','entrega_lavanderia','recibe_lavanderia')
                ->orderBy('fecha_alta','asc')
                ->get();

        if (count($this->headerOt)) {
            $auxId = $this->headerOt->first()->value('id');
        } else {
            $auxId = 0;
        }

        $this->rowsOt = OtCuerpo::where('ot_id', $auxId)
                    ->select('id', 'ot_id', 'articulo_id', 'retira', 'entrega')
                    ->get();

        // $rs = $rs->estados->descripcion;
        // dd($rs->estados->descripcion);
    }

    public function render()
    {
        return view('livewire.ot.ot-index');
    }

    public function selectedOt($id) {
        $this->rowsOt = OtCuerpo::where('ot_id', $id)
                    ->select('id', 'ot_id', 'articulo_id', 'retira', 'entrega')
                    ->get();

        // $this->aux = $this->rowsOt->articulo->categoria->descripcion;
        // $this->aux = $this->rowsOt->first()->articulo->categoria->descripcion;

        // dd($id);
    }


}
