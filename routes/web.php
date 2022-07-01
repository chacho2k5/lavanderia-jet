<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DatatableController;
use App\Http\Livewire\CategoriaShow;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('clientes',ClienteController::class);
Route::resource('categorias',CategoriaController::class);

// Esta ruta en realidad podria ser un metodo del ArticuloController
Route::get('dt/clientes',[DatatableController::class,'clientes'])->name('dt.clientes');
Route::get('dt/categorias',[DatatableController::class,'categorias'])->name('dt.categorias');



// Route::get('categorias',Categorias::class)->name('categorias');
// Route::get('categorias/create',CategoriaShow::class)->name('categorias.create');
// Route::get('categorias/edit',CategoriaShow::class)->name('categorias.edit');
// Route::get('categorias',CategoriaShow::class)->name('categorias');

