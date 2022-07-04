<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h3 class="m-0">
                        Nueva Orden de Trabajo
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><b>FECHA: </b>{{ $fecha_alta }}</div>
            <div><b>Nº </b>{{ $numero }}</div>
            {{-- @json($clientes) --}}
        </div>

        <div class="card-body">
            <form wire:submit.prevent="submit">
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
                    <select wire:model="selCliente" class="form-select">
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

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Prendas</label>
                        {{-- <div wire:ignore> --}}
                        <select wire:model="selectedPrenda" class="form-select">
                            <option value="0">Seleccione una prenda</option>
                            @foreach($prendas as $prenda)
                                <option value="{{ $prenda->id }}">
                                    {{ $prenda->descripcion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="">Recibe</label>
                        <input wire:model="recibe" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="">Entrega</label>
                        <input wire:model="entrega" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-2 mt-4">
                        <button class="btn btn-success">Agregar prenda</button>
                    </div>
                </div>


                <div class="mt-4 row d-print-none">
                    <div class="text-right col-12">
                        <a href="{{ route('ots.index') }}" class="btn btn-secondary" tabindex="5">
                            <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-success" tabindex="6">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>
                            Grabar
                        </button>
                    </div>
                </div>

                {{-- <button type="submit" class="btn btn-success">Save Contact</button> --}}
            </form>
        </div>
    </div>

</div>
