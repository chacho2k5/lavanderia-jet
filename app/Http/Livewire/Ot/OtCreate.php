<?php

namespace App\Http\Livewire\Ot;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\Estado;
use App\Models\EstadoOt;
use App\Models\OtCuerpoTmp;
use Illuminate\Support\Facades\DB;
use Throwable;

class OtCreate extends Component
{
    public $clientes;
    public $cliente_id;
    public $dirCliente;
    public $selectedCliente;

    public $articulos;
    public $selectedArticulo;

    public $estados;
    public $selectedEstado;

    public $numero, $fecha_alta, $estado_id, $entrega_hotel, $recibe_hotel;
    public $entrega_lavanderia, $recibe_lavanderia, $observaciones;

    public $prendas, $prenda, $retira, $entrega, $articulo_id;
    public $otCuerpo;

    public $error = null;
    public $msgErr = null;

    public $aux = 0;
    public $factor = 0;                 // Factor de multiplicacion para la formula x categoria
    public $lavado_formula = 0;         // Tiempo de lavado x formula
    public $lavado_formula_ot = 0;      // Tiempo de lavado x formula para toda la OT

    protected $listeners = ['render'];  // Escucha el evento "render" disparado x otro componente

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
        'numero.required' => 'Debe ingresar el Nro. de la OT.',
        'numero.numeric' => 'INGRESE UN VALOR NUMERICO'
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
        $this->clientes = Cliente::select('id','razonsocial','calle_nombre', 'calle_numero')
                            ->orderBy('razonsocial', 'asc')
                            ->get();
        // $this->articulos = Articulo::all();
        $this->articulos = Articulo::select('id','descripcion', 'categoria_id', 'delicado')
                            ->orderBy('descripcion', 'asc')
                            ->get();

        $this->estados = Estado::select('id','orden', 'descripcion')
            ->orderBy('orden', 'asc')
            ->get();

            $this->retira = '';
            $this->selectedEstado = 1;
<<<<<<< HEAD
=======
            $this->fecha_alta = date('Y-m-d');
>>>>>>> 823bbe9f4e3dc12aadf2f63358708a43d395b20a
    }

    public function render()
    {
        return view('livewire.ot.ot-create');
    }

    public function updatedselectedCliente($value)
    {
        if ($value ==! null) {
            $cliente = Cliente::where('id', $value)->first();
            $this->dirCliente = $cliente->calle_nombre . ' N?? ' . $cliente->calle_numero;
            $this->cliente_id = $cliente->id;
        }
     }

    public function updatedselectedArticulo($value)
    {
        if ($value ==! 0) {
            $prendas = Articulo::where('id', $value)
                            ->select('id','descripcion','categoria_id')
                            ->first();
            $this->prenda = $prendas->descripcion;
            $this->articulo_id = $prendas->id;
            $this->factor = $prendas->categoria->factor;

            // $this->aux = "aaaaa";
        }
    }

    public function agregarItem() {

        $this->validate();

        // Calculo el tiempo de lavado segun formula para el registro
        $this->lavado_formula = (((double) $this->retira * (double) $this->factor) * 60) / 180;

        // Voy calculando el tiempo total de lavado para toda la OT
        $this->lavado_formula_ot = (double) $this->lavado_formula_ot + (double) $this->lavado_formula;
        $this->aux = number_format($this->lavado_formula_ot,2);
        // ((CANT DE FUNDAS DIVIDO 4) + CANTIDAD DE SABANAS)X 60 MINUTOS DIVIDO 180

        $this->msgErr = null;

        OtCuerpoTmp::create([
           'numero' => $this->numero,
           'articulo_id' => $this->articulo_id,
           'prenda' => $this->prenda,
           'retira' => $this->retira,
           'entrega' => $this->entrega,
           'factor' => $this->factor,
           'lavado_formula' => $this->lavado_formula
        ]);

        $this->reset(['selectedArticulo', 'retira', 'articulo_id']);

        // El evento solo lo escucha el componente "show-posts"
        $this->emitTo('ot.ot-table-tmp', 'render');

        // El evento "alert" lo escucha todo el mundo
        // $this->emit('alert','El post se creo correctamente');
    }

    public function grabarOT()
    {
        $this->validate([
            'fecha_alta' => 'required',
            'numero' => 'required|numeric',
            'selectedCliente' => 'required',
            // 'selectedArticulo' => 'required',
            // 'retira' => 'ruequired|numeric',
            'entrega_hotel' => 'required',
            'recibe_lavanderia' => 'required',
        ]);

        // $this->validate();
        $rows = OtCuerpoTmp::where('numero',$this->numero)->count();
        if ($rows == 0) {
            $this->msgErr = 'Debe cargar las prendas de la OT.';
            $this->emitSelf('ot.ot-create');
        } else {
            // El try/catch detecta errores pero no vuelve atras las operaciones sobre la DB
            try {
                // Grabo los datos del encabezado de la OT
                $id = DB::table('ots')->insertGetId([
                'numero' => $this->numero,
                'fecha_alta' => $this->fecha_alta,
                'cliente_id' => $this->cliente_id,
                'estado_id' => $this->selectedEstado,
                'entrega_hotel' => $this->entrega_hotel,
                'recibe_lavanderia' => $this->recibe_lavanderia,
                'lavado_formula' => $this->lavado_formula_ot,
            ]);

                // Agrego el id de la OT a la tabla temporal
                $rows = DB::table('ots_cuerpo_tmp')
                ->where('numero', $this->numero)
                ->update(['ot_id' => $id]);

                // Selecciono las columnas que se deben agregar al cuerpo de la OT
                $rs = OtCuerpoTmp::where('numero', $this->numero)
                    ->select('ot_id', 'articulo_id', 'retira', 'entrega', 'factor', 'lavado_formula')
                    ->get();

                // Paso los resultados a array y dpes grabo el cuerpo de la OT
                $rsa = $rs->toArray();
                DB::table('ots_cuerpo')->insert($rsa);

                // Cargo la tabla "estado_ot" para la trazabilidad de los estados x OT
                EstadoOt::Create([
                    'ot_id' => $id,
<<<<<<< HEAD
                    'estado_id' => '1',
                    'orden' => '0',
                    'lavado' => false,
=======
                    'estado_id' => $this->selectedEstado,
>>>>>>> 823bbe9f4e3dc12aadf2f63358708a43d395b20a
                    'fecha' => $this->fecha_alta,
                    'hora_inicio' => date("H:i:s"),
                    // 'hora_final'
                    ]);

                // Borro los datos de la tabla temporal del cuerpo de la OT
                OtCuerpoTmp::where('ot_id', $id)->delete();
            } catch (Throwable $e) {
<<<<<<< HEAD
=======

>>>>>>> 823bbe9f4e3dc12aadf2f63358708a43d395b20a
                $this->msgErr = "Se ha producido un error..." . $e;
                return false;
            }
            // return to_route('ots.create');
            return to_route('ots.index');
        }

    }

    public function cancelarOT() {

        // Esto es medio trucho xq se podria hacer con los eventos de livewire o ver con alpine
        if ($this->fecha_alta ==! null || $this->numero ==! null || $this->selectedCliente || $this->entrega_hotel || $this->recibe_lavanderia) {
            // Aca deberia ir un alert o modal
            $this->msgErr = "Se realizaron cambios...";
            // Borro los datos cargados en la tabla temporal de la OT
            OtCuerpoTmp::where('numero', $this->numero)->delete();
        } else {
            return to_route('ots.index');
        }
    }
}

