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
    public $articulos, $selectedArticulo;

    public $prendas, $prenda, $retira, $entrega, $articulo_id;
    public $otCuerpo;

    public function mount() {

        $this->filas = OtCuerpoTmp::where('numero', $this->numero)->get();
        // $this->filas = OtCuerpoTmp::all();
        $this->articulos = Articulo::all();
        $this->selectedArticulo = 0;

    }

    public function render()
    {
        // $filas = OtCuerpoTmp::all();
        // $filas = OtCuerpoTmp::latest()->get();

        // $this->filas = OtCuerpoTmp::all();

        // $filas = OtCuerpoTmp::all();


        return view('livewire.ot.ot-table-tmp');
    }

    public function updatedselectedArticulo($value)
    {
        $prendas = Articulo::where('id', $value)->first();
        $this->prenda = $prendas->descripcion;
        $this->articulo_id = $prendas->id;
    }

    public function agregar() {

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

        // $this->validate([
        //     'numero' => 'required|numeric',
        //     'retira' => 'required|numeric',
        // ]);
        // $this->validate();

        OtCuerpoTmp::create([
           'numero' => $this->numero,
           'articulo_id' => $this->articulo_id,
           'prenda' => $this->prenda,
           'retira' => $this->retira,
           'entrega' => $this->entrega,
        ]);

        $this->reset(['selectedArticulo', 'retira']);

        return view('livewire.ot.ot-create');
        // El evento solo lo escucha el componente "show-posts"
        // $this->emitTo('ot.ot-table-tmp', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El post se creo correctamente');

    }

    public function destroy($id) {

        $reg = OtCuerpoTmp::where('id',$id);
        $reg->delete();
    }

}
