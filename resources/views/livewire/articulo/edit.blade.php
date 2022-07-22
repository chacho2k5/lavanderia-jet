<x-jet-dialog-modal wire:model="open_modal">
    <x-slot name="title">
        {{ $titulo_modal }}
    </x-slot>

    <x-slot name="content">
        @if ($action == 'show')<fieldset disabled='disabled'>@endif

            <x-formInputw wire:model="descripcion" name="descripcion" label="Nombre" placeholder='label' autofocus />
            
            <div class="form-group col-md-3 ">
                <label for="">Categorias</label>
                {{-- <div wire:ignore> --}}
                <select wire:model="selectedCategoria" class="form-select form-select-sm @error('selectedCategoria') is-invalid @enderror" title="Debe seleccionar una Categoria">
                    <option value="0">Seleccione una Categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group col-md-3 mt-3">
                <label for="">Delicado</label>
                {{-- <div wire:ignore> --}}
                <select wire:model="delicado" class="form-select form-select-sm " required>
                    <option value="0">Seleccione una Opcion</option>
                   
                        <option value="SI">
                            SI
                        </option>
                        <option value="NO">
                            NO
                        </option>
                    
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




