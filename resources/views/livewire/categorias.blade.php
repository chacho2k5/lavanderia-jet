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
                <button wire:click='create()' class="btn btn-primary btn-sm">Agregar</button>
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
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    {{-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <table id="table" class="table pt-1 table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>DESCRIPCION</th>
                <th>FACTOR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td scope="row">{{ $categoria->id }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>{{ $categoria->factor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</div>
