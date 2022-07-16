<?php

namespace App\Http\Livewire\Ot;

use App\Models\OtCuerpoTmp;
use Livewire\Component;

class OtTableTmp extends Component
{
    protected $listeners = ['render'];

    public $filas;
    public $numero;     //Nro. OT

    public $prendas, $prenda, $retira, $entrega, $articulo_id;
    public $otCuerpo;

    public function mount() {

        $this->filas = OtCuerpoTmp::where('numero', $this->numero)->get();
    }

    public function render()
    {
        return view('livewire.ot.ot-table-tmp');
    }

    public function destroy($id) {

        OtCuerpoTmp::where('id',$id)->delete();

        $this->emitTo('ot.ot-create', 'render');

    }

}
