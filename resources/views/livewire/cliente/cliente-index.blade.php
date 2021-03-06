<div wire:init="loadModelo">
    <x-slot name="header">
        Tabla de Clientes
    </x-slot>

    <div class="container">
    <div class="container-fluid my-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col">
                        <button wire:click="create" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus"></i>
                            Agregar
                        </button>

                        <button wire:click="export" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus"></i>
                            Excel
                        </button>
                    
                    </div>
                    <div class="col col-md-auto">
                        <h3 class="m-0">
                            <input type="text" class="flex-1 me-3 form-control" placeholder="Ingrese busqueda..." wire:model="search">
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- @if (count($registros)) --}}
        <div>
            <table id="table" class="table w-full pt-1 table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="cursor: pointer;"
                            wire:click='order("razonsocial")'>
                            Razon Social
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
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Contacto</th>


                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $registros as $reg)
                        <tr>
                            <td>{{ $reg->razonsocial }}</td>
                            <td>{{ $reg->correo }}</td>
                            <td>{{ $reg->telefono1 }}</td>
                            <td>{{ $reg->contacto }}</td>

                            <td>
                                <button wire:click.prevent="edit_show({{ $reg->id }}, 'show')" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title='Mostrar datos.'>
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button wire:click="edit_show({{ $reg->id }}, 'edit')" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title='Actualizar datos.'>
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button wire:click.prevent="delete({{ $reg->id }})" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title='Borrar'
                                    onclick="confirm('Esta seguro de borrar? - {{ $reg->id }}') || event.stopImmediatePropagation()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
<<<<<<< HEAD
            
            <div class="pagination justify-content-end">
=======
            {{-- {{ $registros->links() }} --}}
>>>>>>> 823bbe9f4e3dc12aadf2f63358708a43d395b20a

                <!--php artisan vendor:publish --tag=laravel-pagination 
                esto pagina-->
                {{ $registros->links() }}
            </div>
            @include('livewire.cliente.edit')
        </div>
        {{-- @else       {{ $registros->links() }}    
            <div class="px-6 py-4">
                No hay coincidencias...
            </div>
        @endif --}}

    </div>

   </div>
</div>
