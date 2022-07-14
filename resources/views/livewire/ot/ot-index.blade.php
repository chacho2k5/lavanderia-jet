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
    <div class="row">
        <div class="card col-md-7 mx-2">
            {{-- <div class="card-header">
                <a href="{{ route('ots.create') }}" class="btn btn-primary btn-sm">Nueva OT</a>
            </div> --}}
            <div class="card-body">
                <table id="table" class="table w-full pt-1 table-hover table-striped" style="display:block; height:350px; overflow-y: scroll">
                    <thead>
                        <tr>
                            <th>FECHA INGRESO</th>
                            <th>CLIENTE</th>
                            <th>ESTADO</th>
                            <th width="100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($headerOt as $header)
                            <tr wire:click="selectedOt({{ $header->id }})">
                                <td>{{ $header->fecha_alta }}</td>
                                <td>{{ $header->cliente->razonsocial }}</td>
                                <td scope="row">{{ $header->estado->descripcion }}</td>
                                <td class="text-center">
                                    ----
                                    {{-- @livewire('categoria-edit', ['categoria' => $categoria], key($categoria->id)) --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mx-2 col">
            <div class="card-body">
                <table id="table" class="table w-full pt-1 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>PRENDA</th>
                            <th class="text-center">RETIRO</th>
                            <th>ESTADO</th>
                            {{-- <th>ESTADO </th> --}}
                            {{-- <th width="100px">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rowsOt as $row)
                        <tr>
                            <td class="text-left">{{ $row->articulo->descripcion }}</td>
                            <td class="text-center">{{ $row->retira }}</td>
                            <td class="text-center">{{ $row->entrega }}</td>
                            <td class="text-center">--xx--</td>
                            {{-- <td>
                                <button wire:click.prevent="destroy({{$row->id}})" class="btn btn-outline-danger btn-sm">Borrar</button>
                            </td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</div>
