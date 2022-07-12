<?php

namespace App\Http\Livewire\Ot;

use App\Models\Ot;
use Livewire\Component;

class OtIndex extends Component
{
    public $ots;

    public function mount() {
        // $apple = Holding::whereRelation('stock', 'ticker', 'AAPL')->get();
        $this->ots = Ot::all();
    }

    public function render()
    {
        return view('livewire.ot.ot-index');
    }
}
