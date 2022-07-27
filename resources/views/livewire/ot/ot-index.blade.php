<div>
    <div class="container-fluid">
        <div class="mb-2 row col-md-10 mx-auto">
            <div class="col">
                <a href="{{ route('ots.create') }}" class="btn btn-primary">Nueva OT</a>
            </div>
            <div class="col col-md-auto">
                <h3 class="m-0">
                    Ordenes de Trabajo
                </h3>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <span>{{ $message }}</span>
                </div>
            @endif
        </div>

        <div class="row col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="form-group col-md-auto">
                            <label for="fecha_alta" class="col-form-label-sm">Fecha OT</label>
                            <input type="date" wire:model.lazy="fecha_alta" class="form-control form-control-sm @error('fecha_alta') is-invalid @enderror" autofocus title="Debe ingresar la fecha de la OT (dia/mes/año).">
                            {{-- @error('fecha_alta')
                                <span class="invalid-feedback" role="alert">
                                    <span class="text-danger">{{ $message }}</span>
                                </span>
                            @enderror --}}
                        </div>
                        <div class="form-group col-md-auto">
                            <label for="numero" class="col-form-label-sm">Número OT</label>
                            <input type="text" wire:model="numero" class="form-control form-control-sm @error('numero') is-invalid @enderror" title="Debe ingresar el Nro. de OT.">
                            {{-- @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <span class="text-danger">{{ $message }}</span>
                                </span>
                            @enderror --}}
                        </div>
                        <div class="form-group col-md-auto">
                            <label for="" class="col-form-label-sm">Clientes</label>
                            <select wire:model="selectedCliente" class="form-select form-select-sm @error('selectedCliente') is-invalid @enderror" title="Debe seleccionar un cliente.">
                                <option value="0">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">
                                        {{ $cliente->razonsocial }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-auto my-4 p-1">
                            <button wire:click.prevent='aplicarFiltro' class="btn btn-info btn-sm">Aplicar Filtro</button>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    {{-- <table id="table" class="table w-full pt-1 table-hover table-striped" style="display:block; height:350px; overflow-y: scroll"> --}}
                    <table id="table" class="table w-full pt-1 table-hover table-striped" style="height:350px; overflow-y: scroll">
                        <thead>
                            <tr>
                                <th>FECHA OT</th>
                                <th>Nro. OT</th>
                                <th>CLIENTE</th>
                                <th>TIEMPO PLANCHADO</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($headerOt as $header)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($header->fecha_alta)) }}</td>
                                    <td>{{ $header->numero }}</td>
                                    <td>{{ $header->cliente->razonsocial }}</td>
                                    <td class="text-center">{{ number_format($header->lavado_formula,2) }}</td>
                                    <td scope="row">{{ $header->estado->descripcion }}</td>
                                    <td class="text-center">---
                                        {{-- <button wire:click.prevent="edit_show({{ $header->id }}, 'show')" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title='Mostrar datos.'
                                            onclick="alert('En desarrollo...') || event.stopImmediatePropagation()">
                                            <i class="fa-regular fa-eye fs-6"></i>
                                        </button>
                                        <button wire:click.prevent="edit_show({{ $header->id }}, 'edit')" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title='Actualizar datos.'
                                            onclick="alert('En desarrollo...') || event.stopImmediatePropagation()">
                                            <i class="fa-regular fa-pen-to-square fs-6"></i>
                                        </button>
                                        <button wire:click.prevent="delete({{ $header->id }})" class="btn btn-outline-danger btn-sm fs-6" data-toggle="tooltip" title='Borrar'
                                            onclick="alert('En desarrollo...') || event.stopImmediatePropagation()">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
