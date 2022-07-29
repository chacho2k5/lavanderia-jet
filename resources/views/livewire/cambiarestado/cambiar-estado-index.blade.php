<div wire:init="loadModelo">
    <x-slot name="header">
        Cambio de Estados
    </x-slot>

    <div class="container">
    <div class="container-fluid my-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    {{-- <div class="col">
                        <button wire:click="create" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus"></i>
                            Agregar
                        </button>
                    </div> --}}
                    <div class="col col-md-auto">
                        <h3 class="m-0">
                            <input type="text" class="flex-1 me-3 form-control" placeholder="Ingrese busqueda..." wire:model="search">
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- @if (count($registros)) --}}
            <table id="table" class="table w-full pt-1 table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("fecha_alta")'>
                            FECHA
                            @if ($sort == 'fecha_alta')
                                @if ($direction == 'asc')
                                    <i class="mt-1 float-end fa-solid fa-sort-up"></i>
                                @else
                                    <i class="mt-1 float-end fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="mt-1 float-end fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("numero")'>
                            NUMERO
                            @if ($sort == 'numero')
                                @if ($direction == 'asc')
                                    <i class="mt-1 float-end fa-solid fa-sort-up"></i>
                                @else
                                    <i class="mt-1 float-end fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="mt-1 float-end fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("razonsocial")'>
                            CLIENTE
                            @if ($sort == 'razonsocial')
                                @if ($direction == 'asc')
                                    <i class="mt-1 float-end fa-solid fa-sort-up"></i>
                                @else
                                    <i class="mt-1 float-end fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="mt-1 float-end fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("estado_nombre")'>
                            ESTADO
                            @if ($sort == 'estado_nombre')
                                @if ($direction == 'asc')
                                    <i class="mt-1 float-end fa-solid fa-sort-up"></i>
                                @else
                                    <i class="mt-1 float-end fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="mt-1 float-end fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col">Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $registros as $reg)
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($reg->fecha_alta)) }}</td>
                            <td>{{ $reg->numero }}</td>
                            <td>{{ $reg->razonsocial }}</td>
                            <td>{{ $reg->estado_nombre }}</td>
                            <td>
                                {{-- <button wire:click.prevent="edit_show({{ $reg->id }}, {{ $reg->estado_orden }}, {{ $reg->estado_nombre }}, 'show')" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title='Mostrar detalle OT.'> --}}
                                <button wire:click.prevent="edit_show({{ $reg->id }}, 'show')" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title='Mostrar detalle OT.'>
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                {{-- <button wire:click="edit_show({{ $reg->id }}, {{ $reg->estado_orden }}, {{ $reg->estado_nombre }}, 'edit')" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title='Cambiar estado.'> --}}
                                <button wire:click="edit_show({{ $reg->id }}, 'edit')" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title='Cambiar estado.'>
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <button wire:click="sumar_estado({{ $reg->id }}, {{ $reg->estado_orden }})" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title='Cambiar estado.'>
                                    <i class="fa-solid fa-plus"></i>
                                </button>

                                {{-- <button wire:click.prevent="delete({{ $reg->id }})" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title='Borrar'
                                    onclick="confirm('Esta seguro de borrar? - {{ $reg->id }}') || event.stopImmediatePropagation()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('livewire.cambiarestado.edit')
        {{-- @else
            <div class="px-6 py-4">
                No hay coincidencias...
            </div>
        @endif --}}

    </div>

   </div>
</div>
