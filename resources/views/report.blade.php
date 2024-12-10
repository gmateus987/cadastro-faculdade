<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relatório de Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex py-4 px-6">
                    <div>
                        <form action="{{ route('dashboard.report') }}" method="GET" class="flex">
                            <div>
                                <x-input-label for="user_id" :value="__('Escolha um usuário')" />
                                <select name="user_id" id="user_id"
                                    class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1"
                                    onchange="this.form.submit()">
                                    <option selected value="{{ null }}" >Todos</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $selectedUserId ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-6">
                                <x-input-label for="reason" :value="__('Escolha um filtro')" />
                                <select name="reason" id="reason"
                                    class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1"
                                    onchange="this.form.submit()">
                                    <option selected value="{{ null }}">Geral</option>
                                    @foreach ($reasons as $reason)
                                    <option value="{{ $reason }}"
                                        {{ $reason == $selectedReason ? 'selected' : '' }}>
                                        {{ str_replace('_', ' ', $reason) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-6">
                                <x-input-label for="month" :value="__('Escolha um Mês')" />
                                <select name="month" id="month"
                                    class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1"
                                    onchange="this.form.submit()">
                                    <option selected value="{{ null }}">Mês</option>
                                    @foreach ($months as $number => $name)
                                    <option value="{{ $number }}"
                                        {{ $number == $selectedMonth ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-6">
                                <x-input-label for="year" :value="__('Escolha um Ano')" />
                                <select name="year" id="year"
                                    class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1"
                                    onchange="this.form.submit()">
                                    <option selected value="{{ null }}">Ano</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year }}"
                                        {{ $year == $selectedYear ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                        </form>
                    </div>

                </div>
                <div class="p-6 text-gray-900 flex flex-col justify-center align-center">

                    @if ($notes->isNotEmpty())

                        <table class="table-auto w-full border border-gray-300 rounded-xl border-separate">
                            <thead>
                                <tr class="bg-base-200 text-center text-gray-700  tracking-wider">
                                    <th class="p-4">ID</th>
                                    <th class="p-4">Nome</th>
                                    <th class="p-4">Valor</th>
                                    <th class="p-4">Motivo</th>
                                    <th class="p-4">Data do Documento</th>
                                    <th class="p-4">Data de Lançamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $note)
                                    <tr class="bg-base-200 text-center text-gray-700  tracking-wider">
                                        <td class="p-4">{{ $note->id }}</td>
                                        <td class="p-4">{{ $note->user->name }}</td>
                                        <td class="p-4">{{ 'R$ ' . number_format($note->value, 2, ',', '.') }}</td>
                                        <td class="p-4">{{ str_replace('_', ' ', $note->reason) }}</td>
                                        <td class="p-4">
                                            {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}
                                        </td>
                                        <td class="p-4">
                                            {{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="py-8">
                            {{ $notes->links() }}
                        </div>
                    @else
                        <span
                            class="text-red-600 font-semibold text-lg self-center mt-3 border border-gray-300 rounded-md shadow-sm p-4">
                            Nenhuma nota encontrada para o usuário selecionado.
                        </span>
                    @endif
                    <span
                        class="font-semibold text-lg self-center mt-5 border border-gray-300 w-auto rounded-md shadow-sm p-2">
                        Valor total: {{ 'R$ ' . number_format($totalAmount, 2, ',', '.') }}</span>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
