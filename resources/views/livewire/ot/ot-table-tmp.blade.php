<div>
    <div class="table-responsive">
    {{-- <table id="tableOtTmp" class="table mt-2 pt-1 table-hover table-striped table-sm" style="display:block; height:240px; overflow-y: scroll"> --}}
    <table id="tableOtTmp" class="table table-hover table-striped table-sm" style="display:block; height:240px; overflow-y: scroll">
        <thead>
            <tr>
                {{-- <th>Numero OT</th>
                <th>ID</th> --}}
                <th class="col-md-6">PRENDA</th>
                <th class="col-md-2 text-center">RETIRA</th>
                <th class="col-md-2 text-center">TIEMPO PLANCHADO</th>
                <th class="col-md-2 text-right">ACCION</th>
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
                <td class="text-center">{{ number_format($fila->lavado_formula,2) }}</td>
                <td class="align-content-md-end">
                    <button wire:click.prevent="destroy({{$fila->id}})" class="btn btn-outline-danger btn-sm">Borrar</button>
                    {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>
