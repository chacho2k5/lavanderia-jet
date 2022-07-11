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
                    <button wire:click.prevent='cancelarOT' class="btn btn-secondary" tabindex="0">
                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                        Cancelar
                    </button>
                    <button wire:click.prevent='grabarOT' class="btn btn-success" tabindex="0">
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
                    <input type="date" wire:model.lazy="fecha_alta" class="form-control form-control-sm @error('fecha_alta') is-invalid @enderror" autofocus title="Debe ingresar la fecha de la OT (dia/mes/año).">
                    {{-- @error('fecha_alta')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror --}}
                </div>
                <div class="form-group col-md-auto">
                    <label for="numero" class="col-form-label-sm">Número OT</label>
                    <input type="text" wire:model="numero" class="form-control form-control-sm @error('numero') is-invalid @enderror" title="Debe ingresar el Nro. de OT.">
                    {{-- @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror --}}
                </div>
                <div class="form-group col-md-auto">
                    <label for="" class="col-form-label-sm">Clientes</label>
                    <select wire:model="selectedCliente" class="form-select form-select-sm @error('selectedCliente') is-invalid @enderror" title="Debe seleccionar un cliente.">
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

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="entrega_hotel" class="m-0 col-form-label-sm">Entrega Hotel</label>
                    <input type="text" wire:model.lazy="entrega_hotel" class="form-control form-control-sm @error('entrega_hotel') is-invalid @enderror" title="Debe ingresar la persona que entrega las prendas.">
                    {{-- @error('entrega_hotel')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror --}}
                </div>
                <div class="form-group col-md-5">
                    <label for="recibe_lavanderia" class="m-0 col-form-label-sm">Recibe Lavanderia</label>
                    <input type="text" wire:model.lazy="recibe_lavanderia" class="form-control form-control-sm @error('recibe_lavanderia') is-invalid @enderror" title="Debe ingresar el nombre de la persona que recibe las prendas en O3 Lavanderia.">
                    {{-- @error('recibe_lavanderia')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror --}}
                </div>
            </div>
        </div>

        <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Prendas</label>
                        {{-- <div wire:ignore> --}}
                        <select wire:model="selectedArticulo" class="form-select form-select-sm @error('selectedArticulo') is-invalid @enderror" title="Debe seleccionar una prenda para cargar en la OT.">
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
                        <input wire:model="retira" type="text" class="form-control form-control-sm @error('retira') is-invalid @enderror" title="Debe ingresar la cantidad retirada de la prenda seleccionada.">
                        {{-- @error('retira')
                            <span class="invalid-feedback" role="alert">
                                <span class="text-danger">{{ $message }}</span>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-group col-md-2 mt-4">
                        <button wire:click.prevent='agregarItem' class="btn btn-primary btn-sm">Agregar prenda</button>
                    </div>

                    @if (count($errors) > 0 || $msgErr ==! null)
                        <div class="form-group col-md-6 mt-0">
                            <div class="alert alert-danger text-danger m-0 p-0">
                                <ul>
                                    @if ($msgErr ==! null)
                                        <li><small>{{ $msgErr }}</small></li>
                                    @endif
                                    @foreach ($errors->all() as $error)
                                        <li><small>{{ $error }}</small></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @endif


                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif


                </div>

                <hr size="4">

                @livewire('ot.ot-table-tmp', ['filas' => $otCuerpo, 'numero' => $numero], key($numero))

        </div>

        {{-- <div class="card-footer">
        </div> --}}
    </div>      {{-- End Card --}}
</form>
{{-- <script>
    Livewire.on('alert', msg => {
        alert(msg);
    })
    </script> --}}
</div>
