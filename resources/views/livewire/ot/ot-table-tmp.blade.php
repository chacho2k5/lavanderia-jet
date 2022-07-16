<div>
    <div class="table-responsive">
    <table id="tableOtTmp" class="table mt-2 pt-1 table-hover table-striped table-sm" style="display:block; height:240px; overflow-y: scroll">
        <thead>
            <tr>
                {{-- <th>Numero OT</th>
                <th>ID</th> --}}
                <th class="col-md-10">PRENDA</th>
                <th class="col-md-2 text-center">RETIRO</th>
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
                <td class="text-center">{{ $fila->retira }}</td>
                <td class="text-center">-</td>
                <td>
                    <button wire:click.prevent="destroy({{$fila->id}})" class="btn btn-outline-danger btn-sm">Borrar</button>
                    {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>
