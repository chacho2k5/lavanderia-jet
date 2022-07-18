<x-jet-dialog-modal wire:model="open_modal">
    <x-slot name="title">
        {{ $titulo_modal }}
    </x-slot>

    <x-slot name="content">
        @if ($action == 'show')<fieldset disabled='disabled'>@endif
            <div class="mb-4 form-group">
                <label class="form-label">Nombre del estado</label>
                <input wire:model="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" tabindex="0" autofocus>

                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <span class="text-danger">{{ $message }}</span>
                    </span>
                @enderror
            </div>

            <div class="mb-4 form-group">
                <label class="form-label">Descripción</label>
                <input wire:model="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror" tabindex="0">

                @error('detalle')
                    <span class="invalid-feedback" role="alert">
                        <span class="text-danger">{{ $message }}</span>
                    </span>
                @enderror
            </div>

            {{-- @if (count($errors) > 0)
                <div class="form-group col-md-6 mt-0">
                    <div class="alert alert-danger text-danger m-0 p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><small>{{ $error }}</small></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif --}}
            {{-- <div class="mb-4">
                <x-jet-label value="Nombre del estado"/>
                <x-jet-input type="text" class="w-full" wire:model='descripcion' autofocus></x-jet-input>
                <x-jet-input-error for="descripcion" />
            </div>
            <div class="mb-4 form-group">
                <x-jet-label value="Detalle"/>
                <x-jet-input type="text" class="w-full @error('detalle') is-invalid @enderror" wire:model='detalle'></x-jet-input>
                <x-jet-input-error for="detalle" />
            </div>
            <x-jet-validation-errors class="blade"></x-jet-validation-errors> --}}

        @if ($action == 'show')</fieldset>@endif
    </x-slot>

    <x-slot name="footer">
        @if ($action == 'show')
            <x-jet-secondary-button wire:click="cancel" class="btn-sm">
                <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                Volver
            </x-jet-secondary-button>
        @else
            <x-jet-secondary-button wire:click="cancel" class="btn-sm">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click='grabar' class="btn-sm">
                Grabar
            </x-jet-danger-button>
        @endif
    </x-slot>
</x-jet-dialog-modal>

    {{-- <x-jet-danger-button wire:click='update' wire:loading.attr='disabled' wire:target='update' class="disabled:bg-secondary btn-sm">
        Grabar
    </x-jet-danger-button>

    <span wire:loading wire:target='update'>Cargando...</span> --}}



