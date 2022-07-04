<?php

namespace App\Http\Livewire\Ots;

use App\Models\Articulo;
use App\Models\Cliente;
use Livewire\Component;

class OtCreate extends Component
{
    public $clientes, $selCliente, $cliente;
    public $dirCliente;

    public $prendas, $selectedPrenda;

    public $numero, $fecha_alta, $cliente_id, $estado_id, $entrega_hotel, $recibe_hotel;
    public $entrega_lavanderia, $recibe_lavanderia, $observaciones;

    public $recibe, $entrega;

    public function mount() {
        $this->clientes = Cliente::all();
        $this->prendas = Articulo::all();
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
}
