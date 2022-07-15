<div>
    <a class="btn btn-outline-success btn-sm" wire:click="$set('openEdit',true)">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>

    <x-jet-dialog-modal id="{{ $estado->id }}" wire:model="openEdit">
        <x-slot name="title">
            Editar ESTADO
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre del estado"/>
                <x-jet-input wire:model.lazy='estado.descripcion' type="text" class="w-full autofocus"></x-jet-input>
                <x-jet-input-error for="estado.descripcion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Detalle"/>
                <x-jet-input wire:model.lazy='estado.detalle' type="text" class="w-full"></x-jet-input>
               <x-jet-input-error for="estado.detalle" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('openEdit',false)" class="btn-sm">
                Cancelar
            </x-jet-secondary-button>

            {{-- <x-jet.danger-button wire:click='save' wire:loading.remove wire:target='save'> --}}
            {{-- <x-jet.danger-button wire:click='save' wire:loading.class='bg-primary' wire:target='save'> --}}
            <x-jet-danger-button wire:click='save' wire:loading.attr='disabled' wire:target='save' class="disabled:bg-secondary btn-sm">
                Grabar
            </x-jet-danger-button>

            <span wire:loading wire:target='save'>Cargando...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
