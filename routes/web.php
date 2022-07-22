<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\DatatableController;
use App\Http\Livewire\Estado\EstadoIndex;
use App\Http\Livewire\Ot\OtCreate;
use App\Http\Livewire\Ot\OtIndex;
use App\Http\Livewire\Articulos;
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

//
// Esto es del Jetstream
//
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::resource('clientes',ClienteController::class);
Route::resource('categorias',CategoriaController::class);
Route::resource('articulos',ArticuloController::class);

// Rutas para el DATATABLE
// Esta ruta en realidad podria ser un metodo del ArticuloController
Route::get('dt/clientes',[DatatableController::class,'clientes'])->name('dt.clientes');
Route::get('dt/categorias',[DatatableController::class,'categorias'])->name('dt.categorias');
Route::get('dt/articulos',[DatatableController::class,'articulos'])->name('dt.articulos');

// *** Ver cambiar / Revisar
// Aca cargo las rutas para los crud en livewire. cargo una plantilla previa para poder cargar cosas que
// solo se usarian en esta vista, estilos, componentes, etc
Route::get('/ots/ot', function () {
    return view('ot');
})->name('ots.ot');

Route::get('/planchado', function () {
    return view('planchado');
})->name('planchado');

//
// LIVEWIRE
//
// Revisar xq no se si ya hacen falta ***
Route::get('/ots/index',OtIndex::class)->name('ots.index');
Route::get('/ots/create',OtCreate::class)->name('ots.create');

Route::get('/estados/index',EstadoIndex::class)->name('estados.index');
// Route::get('/articulos/index',Articulos::class)->name('articulos.index');

