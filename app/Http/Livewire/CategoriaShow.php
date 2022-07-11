<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CategoriaShow extends Component
{
 // Agregando el "layout" le puedo indicar que extienda otra plantilla y no app
    // public function render()
    // {
    //     return view('livewire.show-posts')
    //             ->layout('layouts.base');
    // }

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    // public $categorias;
    public $descripcion, $factor;

    // Se escucha el evento 'render' y se ejecuta el metodo 'render'
    // protected $listeners = ['render', 'render'];
    // Cuando evento y metodo son iguales, se puede poner uno solo
    protected $listeners = ['render'];

    public function render()
    {
        // $posts = Post::all();
        // $posts = Categoria::where('title', 'like', '%' . $this->search . '%')
        //             ->orWhere ('content', 'like', '%' . $this->search . '%')
        //             ->orderBy($this->sort, $this->direction)
        //             ->get();

        $categorias = Categoria::all();

        return view('livewire.categoria-show', compact('categorias'));
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

}
