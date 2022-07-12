<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col">
                    <a href="{{ route('ots.create') }}" class="btn btn-primary">Nueva OT</a>
                </div>
                <div class="col col-md-auto">
                    <h3 class="m-0">
                        Ordenes de Trabajo
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
    <div class="row gx-5">
        <div class="card col-md-7">
            {{-- <div class="card-header">
                <a href="{{ route('ots.create') }}" class="btn btn-primary btn-sm">Nueva OT</a>
            </div> --}}
            <div class="card-body">
                <table id="table" class="table w-full pt-1 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ESTADO</th>
                            <th>CLIENTE</th>
                            <th>FECHA INGRESO</th>
                            <th width="100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                        {{-- @foreach ($categorias as $categoria)
                            <tr>
                                <td scope="row">{{ $categoria->id }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->factor }}</td>
                                <td>
                                    @livewire('categoria-edit', ['categoria' => $categoria], key($categoria->id))
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card col-md-5">
            {{-- <div class="card-header">
                <a href="{{ route('ots.create') }}" class="btn btn-primary btn-sm">Nueva OT</a>
            </div> --}}
            <div class="card-body">
                <table id="table" class="table w-full pt-1 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>PRENDA</th>
                            <th>RETIRO</th>
                            <th>PROCESADA</th>
                            <th>ESTADO </th>
                            <th width="100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                        {{-- @foreach ($categorias as $categoria)
                            <tr>
                                <td scope="row">{{ $categoria->id }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->factor }}</td>
                                <td>
                                    @livewire('categoria-edit', ['categoria' => $categoria], key($categoria->id))
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
