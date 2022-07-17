<div>
    <x-jet-danger-button wire:click="$set('open_create','true')" class="btn-sm">
        Agregar
    </x-jet-danger-button>


    <x-jet-dialog-modal wire:model="open_create">
        <x-slot name="title">
            Crear nuevo ESTADO
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre del estado"/>
                <x-jet-input wire:model.lazy='descripcion' type="text" class="w-full" ></x-jet-input>
                {{-- <x-jet-input-error for="descripcion" /> --}}
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <x-jet-label value="Detalle"/>
                <x-jet-input wire:model.lazy='detalle' type="text" class="w-full"></x-jet-input>
               <x-jet-input-error for="detalle" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_create',false)" class="btn-sm">
            {{-- <x-jet-secondary-button wire:click="cancelar"> --}}
                Cancelar
            </x-jet-secondary-button>

            {{-- <x-jet.danger-button wire:click='save' wire:loading.remove wire:target='save'> --}}
            {{-- <x-jet.danger-button wire:click='save' wire:loading.class='bg-primary' wire:target='save'> --}}
            {{-- <x-jet-danger-button wire:click='save' wire:loading.attr='disabled' wire:target='save' class="disabled:bg-secondary btn-sm"> --}}
            <x-jet-danger-button wire:click='save' class="btn-sm">
                Grabar
            </x-jet-danger-button>

            <span wire:loading wire:target='save'>Cargando...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
