<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h3 class="m-0">
                        Listado de Categorias
                    </h3>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <span>{{ $message }}</span>
                </div>
            @endif
        </div>
    </div>

        <div class="card">
            <div class="card-header">
                {{-- <button wire:click="$set('openCreate','true')" class="btn btn-primary btn-sm">Agregar</button> --}}
                {{-- @livewire('categoria-create') --}}
                @livewire('categoria-create')
            </div>
            <div class="card-body">
                <table id="table" class="table w-full pt-1 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DESCRIPCION</th>
                            <th>FACTOR</th>
                            <th width="100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td scope="row">{{ $categoria->id }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->factor }}</td>
                                <td>
                                    {{-- @livewire('categoria-edit', ['categoria' => $categoria], key($categoria->id)) --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
