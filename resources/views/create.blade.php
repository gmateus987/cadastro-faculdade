<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Notas') }}
        </h2>
    </x-slot>

    @include('store-note')

</x-app-layout>
