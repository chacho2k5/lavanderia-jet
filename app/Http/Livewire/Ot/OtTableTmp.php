<?php

namespace App\Http\Livewire\Ot;

use App\Models\Articulo;
use App\Models\OtCuerpoTmp;
use Livewire\Component;

class OtTableTmp extends Component
{
    protected $listeners = ['render'];

    public $filas;
    public $numero;     //Nro. OT
    // public $articulos, $selectedArticulo;

    public $prendas, $prenda, $retira, $entrega, $articulo_id;
    public $otCuerpo;

    // protected $rules = [
    //     'numero' => 'required',
    //     'retira' => 'required'
    // ];

    public function mount() {

        $this->filas = OtCuerpoTmp::where('numero', $this->numero)->get();
        // $this->filas = OtCuerpoTmp::all();
        // $this->articulos = Articulo::all();
        // $this->selectedArticulo = 0;

    }

    public function render()
    {
        // $filas = OtCuerpoTmp::where('numero', $this->numero)->get();
        // return view('livewire.ot.ot-table-tmp', compact('filas'));
        return view('livewire.ot.ot-table-tmp');
    }

    // public function updatedselectedArticulo($value)
    // {
    //     $prendas = Articulo::where('id', $value)->first();
    //     $this->prenda = $prendas->descripcion;
    //     $this->articulo_id = $prendas->id;
    // }

    public function destroy($id) {

        OtCuerpoTmp::where('id',$id)->delete();

        // $reg = OtCuerpoTmp::where('id',$id);
        // $reg->delete();

        // $deleted = Flight::where('active', 0)->delete();

        // session()->flash('message',"Registro borrado correctamente.");
    }

}
