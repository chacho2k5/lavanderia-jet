<x-app-layout>
    <x-slot name="css">
        {{-- <link rel="stylesheet" href="{{ asset('css/datatables.custom.css') }}" class="rel"> --}}
    </x-slot>

    {{-- <x-slot name="header">
        <h3 class="h3 font-weight-bold">
            Lista de OT
        </h3>
    </x-slot> --}}

    @livewire('planchado.planchado-index')

</x-app-layout>
