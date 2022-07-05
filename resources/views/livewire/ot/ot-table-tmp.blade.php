<div>
    <table id="tableOtTmp" class="table mt-3 pt-1 table-hover table-striped table-sm">
        <thead>
            <tr>
                <th>Numero OT</th>
                <th>ID</th>
                <th>PRENDA</th>
                <th>RETIRO</th>
                <th>ENTREGA</th>
                <th width="100px">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ $filas }} --}}
            @foreach ( $filas as $fila)
            <tr>
                <td>{{ $fila->ot_numero }}</td>
                <td>{{ $fila->articulo_id }}</td>
                <td>{{ $fila->prenda }}</td>
                <td>{{ $fila->retira }}</td>
                <td>{{ $fila->entrega }}</td>
                <td>
                    {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
