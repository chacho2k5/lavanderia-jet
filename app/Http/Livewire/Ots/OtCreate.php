<?php

namespace App\Http\Livewire\Ots;

use App\Models\Articulo;
use App\Models\Cliente;
use Livewire\Component;

class OtCreate extends Component
{
    public $clientes, $selectedCliente;
    public $prendas, $selectedPrenda;

    public $numero, $fecha_alta, $cliente_id, $estado_id, $entrega_hotel, $recibe_hotel;
    public $entrega_lavanderia, $recibe_lavanderia, $observaciones;

    public $recibe, $entrega;

    public function mount() {
        $this->clientes = Cliente::all();
        $this->prendas = Articulo::all();

    }

    public function render()
    {
        return view('livewire.ots.ot-create');
    }
}
