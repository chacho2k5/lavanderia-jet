<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CategoriaCreate extends Component
{
    public $openCreate = false;
    public $descripcion, $factor;
    public $categorias;

    // Esto del "rules" no funciono
    // protected $rules = [
    //     'categoria.descripcion' => 'required|max:50',
    //     'categoria.factor' => 'required',
    //     // 'descripcion' => 'required|max:50',
    //     // 'factor' => 'required',
    // ];

    // public function mount(Categoria $categoria)
    // {
    //     $this->categoria = $categoria;
    // }


    // Esto se utiliza para validar mientras se va escribiendo (hay que sacar el .lazy del control a validar)
    //
    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function grabar() {

        $this->validate([
             'descripcion' => 'required|max:30',
             'factor' => 'required',
         ]);

        //  $this->validate();

         Categoria::create([
            'descripcion' => $this->descripcion,
            'factor' => $this->factor,
         ]);


         $this->reset(['factor','descripcion','openCreate']);

         // El evento solo lo escucha el componente "show-posts"
         $this->emitTo('categoria-show', 'render');

         // El evento "alert" lo escucha todo el mundo
        //  $this->emit('alert','El post se creo correctamente');
    }

    public function cancelar()
    {
        $this->reset(['factor','descripcion','factor']);
    }

    public function render()
    {
        return view('livewire.categoria-create');
    }
}
