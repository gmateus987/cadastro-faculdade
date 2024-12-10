<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Imagem') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto w-1/3 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full flex flex-col items-center justify-center">
                <a href="{{ route('dashboard.search')}}"
                    class="inline-flex items-center justify-center px-4 mt-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150'">
                    Voltar
                </a>
                <div class="p-6 text-gray-900">
                    @if ($path)
                        <img src="{{ url("{$path}") }}" alt="{{$path}}">
                    @else
                        <span class="text-red-600 font-semibold text-xl">Imagem Indisponível.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
