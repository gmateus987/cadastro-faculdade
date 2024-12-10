<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full border border-gray-300 rounded-xl border-separate">
                        <thead>
                            <tr class="bg-base-200 text-center text-gray-700  tracking-wider">
                                <th class="p-4">ID</th>
                                <th class="p-4">Nome</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Data de Registro</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr class="bg-base-200 text-center text-gray-700  tracking-wider">
                                    <td class="p-4">{{ $user->id }}</td>
                                    <td class="p-4">{{ $user->name }}</td>
                                    <td class="p-4">{{ $user->email }}</td>
                                    <td class="p-4">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="p-4">
                                        <a href="{{ route('user-edit', $user->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150'">
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="py-8">
                        {{ $users->links() }}
                    </div>
                    <div class="flex w-full align-center justify-center">
                        @if (session('success'))
                            <span class="flex text-lime-500 font-semibold text-l self-center mt-3">Usuário editado
                                com
                                sucesso!</span>
                        @endif
                        @if ($errors->any())
                            <div>
                                <span class="text-red-600 font-semibold text-l self-center mt-3">
                                    Usuário não encontrado.
                                </span>

                                @foreach ($errors->all() as $error)
                                    <span class="text-red-600 font-semibold text-l self-center mt-1">
                                        {{ $error }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
