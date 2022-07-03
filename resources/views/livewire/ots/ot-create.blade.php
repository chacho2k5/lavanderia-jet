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
        <div class="card-header">

        </div>

        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="fecha_alta" class="form-label">Fecha OT</label>
                    <input type="date" wire:model="fecha_alta" class="form-control mb-4">
                    {{-- @error('name') <span class="error">{{ $message }}</span> @enderror --}}
                    @error('fecha_alta')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="numero" class="form-label">Número OT</label>
                    <input type="text" wire:model="numero" class="form-control mb-4">
                    {{-- @error('name') <span class="error">{{ $message }}</span> @enderror --}}
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">{{ $message }}</span>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" wire:model="email" class="form-control mb-4">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
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
