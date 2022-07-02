<div>
    <x-jet-danger-button wire:click="$set('openCreate','true')" class="btn-primary">
        Agregar
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model='openCreate'>
        <x-slot name="title">
            Crear nueva Categoria
        </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <x-jet-label value="Nombre de la Categoria"/>
            <x-jet-input type="text" class="w-full" wire:model.lazy='descripcion' />

            <x-jet-input-error for="factor" />
        </div>

        <div class="mb-4">
            <x-jet-label value="Factor de multiplicación"/>
            <x-jet-input type="text" class="w-full" wire:model.lazy='factor'/>

            <x-jet-input-error for="factor" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="cancelar">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button wire:click='grabar' wire:loading.attr='disabled' wire:target='grabar' class="disabled:bg-secondary">
            Grabar
        </x-jet-danger-button>

        <span wire:loading wire:target='grabar'>Cargando...</span>
    </x-slot>
    </x-jet-dialog-modal>
</div>
