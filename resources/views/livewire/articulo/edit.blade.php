<x-jet-dialog-modal wire:model="open_modal">
    <x-slot name="title">
        {{ $titulo_modal }}
    </x-slot>

    <x-slot name="content">
        @if ($action == 'show')<fieldset disabled='disabled'>@endif

            <x-formInputw wire:model="descripcion" name="descripcion" label="Nombre" placeholder='label' autofocus />
            <x-formInputw wire:model="categoria->descripcion" name="factor" label="Categoria" placeholder='label' autofocus />
            <x-formInputw wire:model="categoria->factor" name="factor" label="Factor" placeholder='label' autofocus />
            <x-formInputw wire:model="delicado " name="factor" label="Delicado" placeholder='label' autofocus />


            <select wire:model="selectedCategoria" class="form-select form-select-sm @error('selectedCategoria') is-invalid @enderror" title="Debe seleccionar una Categoria">
                            <option value="0">Seleccione una prenda</option>
                            @foreach($articulos as $articulo)
                                <option value="{{ $articulo->id }}">
                                    {{ $articulo->descripcion }}
                                </option>
                            @endforeach
                        </select>

            </div>

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




