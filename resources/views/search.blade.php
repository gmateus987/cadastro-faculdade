<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesquisar Notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex py-4 px-6">
                    <div>
                        <form action="{{ route('dashboard.search') }}" method="get">
                            <x-input-label for="search" :value="__('Pesquisa por dados')" />
                            <input type="text" name="search"
                                class="border border-gray-300 rounded-md focus:border-green-600 focus:ring-green-600 mt-1">
                            <button type="submit"
                                class="bg-green-600 p-2 text-white border border-transparent rounded-md ml-3">Pesquisar</button>
                        </form>
                    </div>

                </div>

                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full border border-gray-300 rounded-xl border-separate">
                        <thead>
                            <tr class="bg-base-200 text-center text-gray-700  tracking-wider">
                                <th class="p-4">ID</th>
                                <th class="p-4">Nome</th>
                                <th class="p-4">Valor</th>
                                <th class="p-4">Motivo</th>
                                <th class="p-4">Data do Documento</th>
                                <th class="p-4">Data de Lançamento</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($notas as $nota)
                                <tr class="bg-base-200 text-center text-gray-700  tracking-wider">
                                    <td class="p-4">{{ $nota->nota_id }}</td>
                                    <td class="p-4">{{ $nota->name }}</td>
                                    <td class="p-4">{{ 'R$ ' . number_format($nota->value, 2, ',', '.') }}</td>
                                    <td class="p-4">{{ str_replace('_', ' ', $nota->reason) }}</td>
                                    <td class="p-4">
                                        {{ \Carbon\Carbon::parse($nota->date)->format('d/m/Y') }}
                                    </td>
                                    <td class="p-4">
                                        {{ ($nota->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td class="p-4">
                                        <a href="{{ route('search.show', $nota->nota_id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150'">
                                            Editar
                                        </a>
                                    </td>
                                    <td class="p-4">
                                        <a href="{{ route('search.image', $nota->nota_id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150'">
                                            Imagem
                                        </a>
                                    </td>


                                </tr>
                            @empty
                                <span>Nota não encontrada</span>
                            @endforelse

                        </tbody>

                    </table>
                    <div class="py-8">
                        {{ $notas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
