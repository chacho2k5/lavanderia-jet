<div wire:init="loadModelo">
<x-slot name="header">
    Tabla de Estados
</x-slot>
    <div class="container-fluid my-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col">
                        {{-- <a href="{{ route('estados.index') }}" class="btn btn-primary">Agregar</a> --}}
                        @livewire('estado.estado-create')
                    </div>
                    <div class="col col-md-auto">
                        <h3 class="m-0">
                            <input type="text" class="flex-1 me-3 form-control" placeholder="Ingrese busqueda..." wire:model="search">
                        </h3>
                    </div>
                </div>

                {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-3">
                        <span>{{ $message }}</span>
                    </div>
                @endif --}}
            </div>
        </div>

        {{-- @if ($posts->count()) --}}
        @if (count($rows))
                {{-- <table id="table" class="table w-full pt-1 table-hover table-striped" style="display:block; overflow-y: scroll"> --}}
            <table id="table" class="table w-full pt-1 table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("descripcion")'>
                            Nombre
                            @if ($sort == 'descripcion')
                                @if ($direction == 'asc')
                                    {{-- <i class="mt-1 float-end fa-solid fa-arrow-up-a-z"></i> --}}
                                    <i class="mt-1 float-end fa-solid fa-sort-up"></i>
                                @else
                                    {{-- <i class="mt-1 float-end fa-solid fa-arrow-down-a-z"></i> --}}
                                    <i class="mt-1 float-end fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="mt-1 float-end fa-solid fa-sort"></i>
                                {{-- <i class="mt-1 float-end fa-solid fa-up-down"></i> --}}
                            @endif
                        </th>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("detalle")'>
                            Descripción
                            @if ($sort == 'detalle')
                                @if ($direction == 'asc')
                                    {{-- <i class="mt-1 float-end fa-solid fa-arrow-up-a-z"></i> --}}
                                    <i class="mt-1 float-end fa-solid fa-sort-up"></i>
                                @else
                                    {{-- <i class="mt-1 float-end fa-solid fa-arrow-down-a-z"></i> --}}
                                    <i class="mt-1 float-end fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="mt-1 float-end fa-solid fa-sort"></i>
                                {{-- <i class="mt-1 float-end fa-solid fa-up-down"></i> --}}
                            @endif
                        </th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $rows as $row)
                        <tr>
                            <td>{{ $row->descripcion }}</td>
                            <td>{{ $row->detalle }}</td>
                            <td>
                                {{-- @livewire('estado.estado-edit', ['row' => $row], key($row->id)) --}}
                                <a class="btn btn-outline-success btn-sm" wire:click="edit({{ $row }})">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                {{-- <a class="btn btn-outline-danger btn-sm" wire:click="delete({{ $row }})">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a> --}}
                                <button wire:click.prevent="delete({{ $row->id }})" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title='Borrar'
                                    onclick="confirm('Esta seguro de borrar? - {{ $row->id }}') || event.stopImmediatePropagation()">
                                    <i class="fa-regular fa-trash-can"></i>
                                    {{-- <i class="fa fa-trash fs-6"></i> --}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay coincidencias...
            </div>
        @endif

        @if (count($rows))
            <x-jet-dialog-modal id="{{ $row->id }}" wire:model="open_edit">
                <x-slot name="title">
                   Actualizar ESTADO
                </x-slot>

                <x-slot name="content">
                    <div class="mb-4">
                        <x-jet-label value="Nombre del estado"/>
                        <x-jet-input wire:model.lazy='modelo.descripcion' type="text" class="w-full autofocus"></x-jet-input>
                        <x-jet-input-error for="modelo.descripcion" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Detalle"/>
                        <x-jet-input wire:model.lazy='modelo.detalle' type="text" class="w-full"></x-jet-input>
                    <x-jet-input-error for="modelo.detalle" />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('open_edit',false)" class="btn-sm">
                        Cancelar
                    </x-jet-secondary-button>

                    {{-- <x-jet.danger-button wire:click='save' wire:loading.remove wire:target='save'> --}}
                    {{-- <x-jet.danger-button wire:click='save' wire:loading.class='bg-primary' wire:target='save'> --}}
                    <x-jet-danger-button wire:click='update' wire:loading.attr='disabled' wire:target='update' class="disabled:bg-secondary btn-sm">
                        Grabar
                    </x-jet-danger-button>

                    <span wire:loading wire:target='update'>Cargando...</span>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

    </div>

</div>
