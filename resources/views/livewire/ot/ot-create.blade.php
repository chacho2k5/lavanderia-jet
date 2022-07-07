<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<form wire:submit.prevent="grabar" autocomplete="off" class="needs-validation">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                  <h3>Nueva OT</h3>
                </div>
                @if ($error ==! null)
                    <span class="text-danger">{{ $error }}</span>
                @endif
                <div class="col-md-3">
                    <a href="{{ route('ots.index') }}" class="btn btn-secondary btn-sm" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success btn-sm" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        Grabar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        {{-- <div class="card-header d-flex justify-content-between"> --}}
        <div class="card-header justify-content-start">
            <div class="row">
                <div class="form-group col-md-auto">
                    <label for="fecha_alta" class="col-form-label-sm">Fecha OT</label>
                    <input type="date" wire:model="fecha_alta" class="form-control form-control-sm" autofocus>
                    @error('fecha_alta')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-auto">
                    <label for="numero" class="col-form-label-sm">Número OT</label>
                    <input type="text" wire:model.lazy="numero" class="form-control form-control-sm">
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-auto">
                    <label for="" class="col-form-label-sm">Clientes</label>
                    <select wire:model="selectedCliente" class="form-select form-select-sm">
                        <option value="0">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->razonsocial }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($dirCliente !== null)
                <div class="col-md-auto">
                    <label for="" class="col-form-label-sm">Direccion Cliente</label>
                    <input wire:model='dirCliente' type="text" class="form-control form-control-sm" disabled>
                </div>
            @endif
            </div>
        </div>

        <div class="card-body">
                {{-- <div class="row mt-2">
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
                </div> --}}

                @livewire('ot.ot-table-tmp', ['filas' => $otCuerpo, 'numero' => $numero], key($numero))
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

        </div>
        <div class="card-footer">
              <div class="row justify-content-between">
                <div class="form-group col-md-5">
                    <label for="entrega_hotel" class="m-0 col-form-label-sm">Entrega Hotel</label>
                    <input type="text" wire:model="entrega_hotel" class="form-control form-control-sm">
                    @error('entrega_hotel')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="recibe_lavanderia" class="m-0 col-form-label-sm">Recibe Lavanderia</label>
                    <input type="text" wire:model="recibe_lavanderia" class="form-control form-control-sm">
                    @error('recibe_lavanderia')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>      {{-- End Card --}}
</form>
</div>
