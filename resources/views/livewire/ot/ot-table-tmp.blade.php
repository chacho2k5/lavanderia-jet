<div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="">Prendas</label>
            {{-- <div wire:ignore> --}}
            <select wire:model="selectedArticulo" class="form-select form-select-sm">
                <option value="0">Seleccione una prenda</option>
                @foreach($articulos as $articulo)
                    <option value="{{ $articulo->id }}">
                        {{ $articulo->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="">Retira</label>
            <input wire:model.lazy="retira" type="text" class="form-control form-control-sm">
        </div>
        {{-- <div class="form-group col-md-1">
            <label for="">Entrega</label>
            <input wire:model="entrega" type="text" class="form-control form-control-sm">
        </div> --}}
        <div class="form-group col-md-2 mt-4">
            <button wire:click='agregar' class="btn btn-primary btn-sm">Agregar prenda</button>
        </div>
    </div>

    <hr size="4">

    <div class="table-responsive">
    <table id="tableOtTmp" class="table mt-2 pt-1 table-hover table-striped table-sm" style="display:block; height:240px; overflow-y: scroll">
        <thead>
            <tr>
                {{-- <th>Numero OT</th>
                <th>ID</th> --}}
                <th class="col-md-10">PRENDA</th>
                <th class="col-md-2">RETIRO</th>
                <th>ENTREGA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ $filas }} --}}
            @foreach ( $filas as $fila)
            <tr>
                {{-- <td>{{ $fila->ot_numero }}</td>
                <td>{{ $fila->articulo_id }}</td> --}}
                <td>{{ $fila->prenda }}</td>
                <td>{{ $fila->retira }}</td>
                <td>{{ $numero }}</td>
                <td>
                    <button wire:click="destroy({{$fila->id}})" class="btn btn-outline-danger btn-sm">Borrar</button>
                    {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>
