<?php

namespace App\Http\Livewire\Ot;

use App\Models\OtCuerpoTmp;
use Livewire\Component;


class OtTableTmp extends Component
{

    protected $listeners = ['render'];

    public $filas;

    public function mount() {
        $this->filas = OtCuerpoTmp::all();
    }

    public function render()
    {
        // $filas = OtCuerpoTmp::all();
        // $filas = OtCuerpoTmp::latest()->get();
        $filas = OtCuerpoTmp::all();

        return view('livewire.ot.ot-table-tmp');
    }
}
