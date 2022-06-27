<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends Controller
{
    public function clientes() {
        // $clientes = Cliente::select('razonsocial','cuil','telefono1', 'iva_id');
        // $clientes = Cliente::with('iva')->select('clientes.*');
        $clientes = Cliente::with('iva','barrio','localidad','provincia')->select('clientes.*');
        return DataTables::of($clientes)
                ->addColumn('actions','cliente.action')    //columna de dt y vista
                ->rawColumns(['actions'])   //es para procesar el html
                ->toJson();
    }

    // public function articulos() {
    //     $articulos = DB::table('articulos')
    //     // ->select('id', 'codigo', 'descripcion', 'cantidad', 'precio')
    //     ->select('articulos.*')
    //     ->orderBy('descripcion', 'asc')
    //     ->get();
    //     return DataTables()::of($articulos)
    //         ->addColumn('actions','articulo.action')    //columna de dt y vista
    //         ->rawColumns(['actions'])   //es para procesar el html
    //         ->toJson();
    // }

}
