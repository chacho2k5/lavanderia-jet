<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                  <h3>Nueva OT</h3>
                </div>
                <div class="col-md-2 justify-content-md-end">
                    <a href="{{ route('ots.index') }}" class="btn btn-secondary btn-sm" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                        Cancelar
                    </a>
                </div>
                <div class="col-md-2 justify-content-md-end">
                    <button wire:click='grabar' class="btn btn-success btn-sm" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        Grabar
                    </button>
                </div>
            </div>
            {{-- <div class="mb-2 row position-sticky">
                <div class="col-md-8 justify-md-start">
                    Nueva Orden de Trabajo
                </div>
                <div class="col-md-4 justify-md-end">
                    <a href="{{ route('ots.index') }}" class="btn btn-secondary btn-sm" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success btn-sm" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        Grabar
                    </button>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><b>FECHA: </b>{{ $fecha_alta }}</div>
            <div><b>Nº </b>{{ $numero }}</div>
            {{-- @json($clientes) --}}
        </div>

        <div class="card-body">
            <form wire:submit.prevent="grabar">
            <div class="row gx-4 gy-1">
                <div class="form-group col-md-2">
                    <label for="fecha_alta" class="form-label">Fecha OT</label>
                    <input type="date" wire:model="fecha_alta" class="form-control">
                    @error('fecha_alta')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label for="numero" class="form-label">Número OT</label>
                    <input type="text" wire:model="numero" class="form-control">
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Clientes</label>
                    {{-- <div wire:ignore> --}}
                    <select wire:model="selectedCliente" class="form-select">
                        <option value="0">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->razonsocial }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-8">
                    {{-- @json($dirCliente) --}}
                    @if ($dirCliente !== null)
                        <label for="">Dirección del Cliente</label>
                        {{-- <input type="text" class="form-control" value="{{ $dirCliente[0]->razonsocial }}" placeholder="Dirección del cliente" disabled> --}}
                        <input wire:model='dirCliente' type="text" class="form-control" placeholder="Dirección del cliente" disabled>
                    @endif
                </div>
            </div>

                <div class="row mt-2">
                    <div class="form-group col-md-5">
                        <label for="entrega_hotel" class="form-label">Entrega Hotel</label>
                        <input type="text" wire:model="entrega_hotel" class="form-control">
                        @error('entrega_hotel')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-danger">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="recibe_lavanderia" class="form-label">Recibe Lavanderia</label>
                        <input type="text" wire:model="recibe_lavanderia" class="form-control">
                        @error('recibe_lavanderia')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-danger">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="form-group col-md-5">
                        <label for="entrega_lavanderia" class="form-label">Entrega Lavanderia</label>
                        <input type="text" wire:model="entrega_lavanderia" class="form-control">
                        @error('entrega_lavanderia')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-danger">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-5">
                        <label for="recibe_hotel" class="form-label">Recibe Hotel</label>
                        <input type="text" wire:model="recibe_hotel" class="form-control">
                        @error('recibe_hotel')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-danger">{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
<hr size="6">
                <div class="row mt-3">
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
                        <input wire:model="retira" type="text" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="">Entrega</label>
                        <input wire:model="entrega" type="text" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-2 mt-4">
                        <button wire:click='cargarOtCuerpo' class="btn btn-primary btn-sm">Agregar prenda</button>
                    </div>
                    <div class="form-group col-md-2 mt-4">
                        <button wire:click="$emitTo('ot.ot-table-tmp','render')" class="btn btn-secondary btn-sm">Refresh</button>
                    </div>
                </div>

                @livewire('ot.ot-table-tmp', ['filas' => $otCuerpo], key($selectedArticulo))
                {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                {{-- @livewire('ot.ot-table-tmp') --}}


                {{-- <table id="tableOtTmp" class="table mt-3 pt-1 table-hover table-striped table-sm">
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
                        @foreach ( $otCuerpo as $fila)
                        <tr>
                            <td>{{ $fila->ot_numero }}</td>
                            <td>{{ $fila->articulo_id }}</td>
                            <td>{{ $fila->prenda }}</td>
                            <td>{{ $fila->retira }}</td>
                            <td>{{ $fila->entrega }}</td>
                            <td>
                                @livewire('edit-post', ['post' => $post], key($post->id))
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table> --}}

                {{-- <button type="submit" class="btn btn-success">Save Contact</button> --}}
            </form>
        </div>
    </div>

</div>
