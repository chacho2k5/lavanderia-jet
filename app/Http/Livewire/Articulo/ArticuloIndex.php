<?php

namespace App\Http\Livewire\Articulo;

use App\Models\Articulo;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class ArticuloIndex extends Component
{

    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $sort = 'descripcion';
    public $direction = 'asc';
    public $readyToLoad = false;

    public $categorias, $categoria;
    public $selectedCategoria;
  
    
    // Conjunto de datos
    // public Estado $registros;
    //public $registros;
  

    // Datos para el alta
    public $registro_id, $descripcion,  $categoria_id,  $delicado;

    // Datos para la modificacion
    public $open_modal = false;

    public $readOnly = null;

    public $aux = 0;
    public $action;      // edit - show
    public $titulo_modal = "Crear nuevo Articulo";

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    protected $rules = [
        'descripcion' => 'required|max:100|min:3',
        'selectedCategoria' => 'required'
        //'detalle' => 'required|max:100|min:2',
    ];

    protected $messages = [
        'descripcion.required' => 'Debe ingresar un Estado',
     //   'descripcion.min' => 'El Estado debe tener entre 3 y 10 caracteres',
     //   'descripcion.max' => 'El Estado debe tener entre 3 y 10 caracteres',
     //   'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
     //   'detalle.min' => 'La descripción del Estado debe tener entre 3 y 10 caracteres',
        // 'invitation.email.unique.invitations' => 'The email has already been invited.',
        // 'invitation.email.unique.users' => 'An account with this email has already been registered.',
    ];

    

    public function mount() {
        $this->categorias = Categoria::select('id','descripcion')
        ->orderBy('descripcion', 'asc')
        ->get();
      
    }

    public function render()
    {
       $registros = Articulo::where('descripcion', 'like', '%' . $this->search . '%')
               ->orWhere('categoria_id', 'like', '%' . $this->search . '%')
               ->orderBy($this->sort, $this->direction)
               ->paginate(10);

       return view('livewire.articulo.articulo-index', ['registros' => $registros ]);


      
        /*

            'registros' => Articulo::where('descripcion', 'like', '%' . $this->search . '%')
               ->orWhere('categoria_id', 'like', '%' . $this->search . '%')
               ->orderBy($this->sort, $this->direction)
               ->paginate(10),
        */


     }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'descripcion' => 'required|max:100|min:3',
            'selectedCategoria' => 'required',
            'delicado' => 'required',
           // 'detalle' => 'required|max:100|min:3',
        ]);
    }


    public function loadModelo() {
        $this->readyToLoad = true;
    }

    public function order($sort) {

        if($this->sort == $sort) {
            if($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit_show($id, $value) {
    // Muestro el modal, uso el mismo para el Ver/editar.
    // Defino y el titulo y asigno los valores de los campos con las variables del reg. seleccionado.

        if ($value == 'edit') {
            $this->titulo_modal = "Actualizar Articulo";
        } else {
            $this->titulo_modal = "Articulo";
        }

        $reg = Articulo::findOrFail($id);
        $this->registro_id = $reg->id;
        $this->descripcion = $reg->descripcion;
        $this->categoria_id = $reg->categoria_id;
        $this->delicado = $reg->delicado;
        $this->selectedCategoria = $reg->categoria_id;

        $this->action = $value;
        $this->open_modal = true;
    }

    public function create() {
    // Muestro el modal para el Alta
        $this->cancel();
        $this->action = 'create';
        $this->open_modal = true;
        $this->selectedCategoria = '';
    }

    public function grabar() {
    // Grabo las modificaciones y las altas

        $this->validate();

        Articulo::updateOrCreate(['id' => $this->registro_id],
        [
            'descripcion' => $this->descripcion,
            'categoria_id' => $this->categoria_id,
            'delicado' => $this->delicado,
        ]);

        $this->cancel();

        // El evento solo lo escucha el componente "show-posts"
    //     // $this->emitTo('estado.estado-index', 'render');

    //     // El evento "alert" lo escucha todo el mundo
    //     // $this->emit('alert','El Estado se creo correctamente');

    }

    public function delete($id) {

        Articulo::destroy($id);
    }

    public function cancel()
    {
        $this->reset(['registro_id', 'descripcion', 'categoria_id','delicado', 'open_modal', 'titulo_modal']);

    }

    public function updatedselectedCategoria($value){
       
        if ($value ==! null) {
            $categorias = Categoria::where('id', $value)->first();
            $this->descripcion = $categorias->descripcion;
            $this->id = $categorias->id;
        
        }
      
    }

}

