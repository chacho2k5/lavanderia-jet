<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Iva;
use Yajra\Datatables\Datatables;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        // $clientes = Cliente::select('id');
        // $clientes = Cliente::all();
        // return view('cliente.index')->with('clientes', $clientes);

        return view('cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ivas = Iva::all();
        return view('cliente.create',['ivas'=>$ivas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->validated());
                                // ->withInput());

        // return redirect()->route('clientes.index');
        // return $request;
        // return to_route('clientes.index');
        return to_route('clientes.index')
                    ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $ivas = Iva::all();
        return view('cliente.show', compact('cliente', 'ivas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    // public function edit($id)
    {
        // $cliente = Cliente::find($id);
        // return view('cliente.edit')->with('cliente', $cliente);
        $ivas = Iva::all();
        // return view('cliente.edit', compact('cliente'), ['ivas'=>$ivas]);
        return view('cliente.edit', compact('cliente', 'ivas'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        return to_route('clientes.index')->with('success','Cliente modificado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return to_route('clientes.index')->with('success','Cliente eliminado');
        // return view ('cliente.index');
    }

}
