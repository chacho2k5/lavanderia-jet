{{-- para ver el tamaño del modal mirar el archivo \view\vendor\component\modal.blade--}}
<x-jet-dialog-modal wire:model="open_modal" maxWidth="xl">
    <x-slot name="title">
        {{ $titulo_modal }}
    </x-slot>

    <x-slot name="content">
        @if ($action == 'show')<fieldset disabled='disabled'>@endif

            <x-formInputw wire:model="razonsocial" name="razonsocial" label="Nombre del cliente" placeholder='label' autofocus />
            <x-formInputw wire:model="contacto" name="contacto" label="Contacto" placeholder='label' autofocus />
            <x-formInputw wire:model="cuit" name="cuit" label="Cuit" placeholder='label' autofocus />
            <x-formInputw wire:model="iva_id" name="iva" label="Iva " placeholder='label' autofocus />
            <x-formInputw wire:model="telefono1" name="telefono1" label="Telefono_1" placeholder='label' autofocus />
            <x-formInputw wire:model="telefono2" name="telefono2" label="Telefono_2" placeholder='label' autofocus />
            <x-formInputw wire:model="correo" name="corre" label="E-mail" placeholder='label' autofocus />
            <x-formInputw wire:model="calle_nombre" name="calle_nombre" label="Direccion" placeholder='label' autofocus />
            <x-formInputw wire:model="calle_numero" name="calle_numero" label="Numero" placeholder='label' autofocus />
            <x-formInputw wire:model="codigo_postal" name="codigo_postal" label="Codigo Postal" placeholder='label' autofocus />
            <x-formInputw wire:model="cuit" name="cuit" label="Nombre del estado" placeholder='label' autofocus />
            <x-formInputw wire:model="fecha_alta" name="fecha_alta" label="Fecha de Alta" placeholder='label' autofocus />

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




