<?php

namespace App\Http\Livewire\Ot;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\OtCuerpoTmp;
use Illuminate\Support\Facades\DB;

class OtCreate extends Component
{
    public $clientes, $cliente;
    public $dirCliente;
    public $selectedCliente;

    public $articulos;
    public $selectedArticulo;

    public $numero, $fecha_alta, $cliente_id, $estado_id, $entrega_hotel, $recibe_hotel;
    public $entrega_lavanderia, $recibe_lavanderia, $observaciones;

    public $prendas, $prenda, $retira, $entrega, $articulo_id;
    public $otCuerpo;

    public $error = null;

    // protected $listeners = ['render'];

    // Ver esto para grabar desde un array directo a una tabla #######################
    //
    // https://stackoverflow.com/questions/67311673/livewire-validateonly-with-validate-in-the-same-component
    // https://www.csrhymes.com/2021/05/25/testing-validation-rules-in-a-livewire-component.html
    //

    protected function rules() {
        return [
            'numero' => 'required|numeric',
            // 'selectedCliente' => 'required',
            'selectedArticulo' => 'required',
            'retira' => 'required|numeric',
            // 'entrega_hotel' => 'required',
            // 'recibe_lavanderia' => 'required',
        ];
    }

    protected $messages = [
        // 'invitation.email.unique.invitations' => 'The email has already been invited.',
        // 'invitation.email.unique.users' => 'An account with this email has already been registered.',
        // 'text.min' => 'Keep typing...'
    ];

    // public function updated($numero)
    // {
    //     $this->validateOnly($numero);
    // }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'numero' => 'required|numeric|min:1',
            'selectedArticulo' => 'required',
            'retira' => 'required|numeric|min:1',
        ]);
    }

    public function mount() {
        $this->estado_id = 1;   // esto esta dibujado, dpes hay q poner el combo
        $this->otCuerpo = OtCuerpoTmp::all();
        $this->clientes = Cliente::all();
        // $this->articulos = Articulo::all();
        $this->articulos = Articulo::select('id','descripcion')->get();
        $this->retira = '';
    }

    public function updatedselectedCliente($value)
    {
        if ($value ==! null) {
            $cliente = Cliente::where('id', $value)->first();
            $this->dirCliente = $cliente->calle_nombre . ' Nº ' . $cliente->calle_numero;
            $this->cliente_id = $cliente->id;
        }
     }

    public function updatedselectedArticulo($value)
    {
        if ($value ==! 0) {
            $prendas = Articulo::where('id', $value)
                            ->select('id','descripcion')
                            ->first();
            $this->prenda = $prendas->descripcion;
            $this->articulo_id = $prendas->id;
        }
    }

    public function render()
    {
        return view('livewire.ot.ot-create');
    }

    public function grabarOT()
    {
        $this->validate([
            'fecha_alta' => 'required',
            // 'numero' => 'required|numeric',
            'selectedCliente' => 'required',
            // 'selectedArticulo' => 'required',
            // 'retira' => 'ruequired|numeric',
            'entrega_hotel' => 'required',
            'recibe_lavanderia' => 'required',
        ]);

        // $this->validate();

        // Grabo los datos del encabezado de la OT
        $id = DB::table('ots')->insertGetId([
            'numero' => $this->numero,
            'fecha_alta' => $this->fecha_alta,
            'cliente_id' => $this->cliente_id,
            'estado_id' => 1,
            'entrega_hotel' => $this->entrega_hotel,
            'recibe_lavanderia' => $this->recibe_lavanderia,
        ]);

        // Agrego el id de la OT a la tabla temporal
        $rows = DB::table('ots_cuerpo_tmp')
            ->where('numero',$this->numero)
            ->update(['ot_id' => $id]);

         // Selecciono las columnas que se deben agregar al cuerpo de la OT
        $rs = OtCuerpoTmp::where('numero',$this->numero)
                    ->select('ot_id','articulo_id','retira','entrega')
                    ->get();

        // Paso los resultados a array y dpes grabo el cuerpo de la OT
        $rsa = $rs->toArray();
        DB::table('ots_cuerpo')->insert($rsa);

        OtCuerpoTmp::where('ot_id',$id)->delete();

        return to_route('ots.create');

        // $this->reset('fecha_alta', 'numero', 'selectedCliente', 'dirCliente', 'entrega_hotel', 'recibe_lavanderia');
        // $this->reset(['selectedArticulo', 'retira', 'articulo_id']);
        // $this->emitSelf('ot.ot-create');

        // dd();
        // session()->flash('message', $rows);
    }

    public function agregarItem() {

         $this->validate();

        OtCuerpoTmp::create([
           'numero' => $this->numero,
           'articulo_id' => $this->articulo_id,
           'prenda' => $this->prenda,
           'retira' => $this->retira,
           'entrega' => $this->entrega,
        ]);

        $this->reset(['selectedArticulo', 'retira', 'articulo_id']);

        // El evento solo lo escucha el componente "show-posts"
        $this->emitTo('ot.ot-table-tmp', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El post se creo correctamente');
    }
}

