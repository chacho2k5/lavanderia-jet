<?php

namespace App\Http\Livewire\Ots;

use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\OtCuerpoTmp;
use Livewire\Component;

class OtCreate extends Component
{
    public $clientes, $selCliente, $cliente;
    public $dirCliente;

    public $articulos, $selectedArticulo;

    public $numero, $fecha_alta, $cliente_id, $estado_id, $entrega_hotel, $recibe_hotel;
    public $entrega_lavanderia, $recibe_lavanderia, $observaciones;

    public $prendas, $recibe, $entrega;
    public $otCuerpo;

    public function mount() {
        $this->otCuerpo = OtCuerpoTmp::all();
        $this->clientes = Cliente::all();
        $this->articulos = Articulo::all();
    }

    public function updatedselCliente($value)
    {
        $cliente = Cliente::where('id', $value)->first();
        $this->dirCliente = $cliente->calle_nombre . ' Nº ' . $cliente->calle_numero;

        // $this->clientes = Cliente::where('id', $value)->get();
        // $this->dirCliente = $this->clientes->first()->id ?? null;

        // $cliente = Cliente::where('id', $value)->first('razonsocial');

        // $this->dirCliente = json_encode($this->dirCliente);
        // $this->dirCliente = 'puta direccion';
    }

    public function render()
    {
        return view('livewire.ots.ot-create');
    }

    public function grabar()
    {

    }

    public function cargarOtCuerpo() {
        // $this->validate([
        //     'title' => 'required|max:10',
        //     'content' => 'required|max:100',
        // ]);

        // $this->validate();

        OtCuerpoTmp::create([
           'ot_numero' => $this->numero,
           'articulo_id' => $this->selectedArticulo,
           'recibe' => $this->recibe,
           'entrega' => $this->entrega,
        ]);

        // $this->reset(['open','title','content']);

        // El evento solo lo escucha el componente "show-posts"
        // $this->emitTo('show-posts', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El post se creo correctamente');

    }
}
