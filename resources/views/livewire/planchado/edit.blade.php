<x-jet-dialog-modal wire:model="open_modal">
    <x-slot name="title">
        {{ $titulo_modal }}
    </x-slot>

    <x-slot name="content">
        @if ($action == 'show')<fieldset disabled='disabled'>@endif
            <x-formInputw wire:model="estado_nombre_anterior" name="estado_nombre_anterior" label="Estado actual" disabled/>

            <div class="form-group col-md-auto">
                <label for="" class="col-form-label-sm">Nuevo Estado</label>
                <select wire:model="selectedEstado" class="form-select form-select-lg" title="Seleccionar nuevo estado.">
                    <option value="0">Seleccione un estado</option>
                    @foreach($estados as $row)
                        <option value="{{ $row->id }}">
                            {{ $row->descripcion }}
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
