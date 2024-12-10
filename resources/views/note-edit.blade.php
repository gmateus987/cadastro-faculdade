<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Notas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto w-1/3 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    <form :action="{{ route('search.edit', $nota->id) }}" method="POST" enctype="multipart/form-data"
                        class="mb-2 flex flex-col justify-center">
                        @csrf
                        @method('PUT')

                        <x-input-label for="user_id" :value="__('Nome')" />
                        <select name="user_id" id="user_id"
                            class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1">
                            <option disabled selected value>Selecione um usuário</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <br>

                        <x-input-label for="value" :value="__('Valor')" />
                        <x-text-input id="value" class="block mt-1 w-64" type="text"
                            name="value" value="{{ $nota->value }}" autofocus /><br>
                        <x-input-label for="date" :value="__('Data')" />
                        <x-text-input id="date" class="block mt-1 w-64" type="date" name="date"
                            value="{{ $nota->date }}" /><br>
                        <x-input-label for="reason" :value="__('Motivo')" />
                        <select name="reason" id="reason" value="{{ $nota->reason }}"
                            class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1">
                            <option value="" disabled selected value>Selecione um item</option>
                            <option value="Combustível">Combustível</option>
                            <option value="Limpeza_de_Veículo">Limpeza de veículo</option>
                            <option value="Refeição">Refeição</option>
                            <option value="Lanche">Lanche</option>
                            <option value="Hospedagem">Hospedagem</option>
                            <option value="Passagem">Passagem</option>
                            <option value="Escritório">Escritório</option>
                            <option value="Produtos_de_limpeza">Produtos de limpeza</option>
                            <option value="Outro">Outro</option>
                        </select>
                        <br>
                        <x-input-label for="note_img" :value="__('Imagem da Nota')" />
                        <x-text-input id="note_img"
                            class="block mt-1 w-64 from-control-file
                  file:bg-green-600
                  file:px-4 file:py-2 file:m-3
                  file:border-none
                  file:rounded-md
                  file:text-white
                  file:cursor-pointer
                  file:hover:bg-green-700
                  file:active:bg-green-600
                  file:font-semibold file:text-xs file:text-white file:uppercase
                  file:focus:border-green-600 file:focus:ring-green-600
                  focus:border-green-600 focus:ring-green-600
                  text-black/80
                  cursor-pointer
                  bg-gray-100
                  border
                  border-gray-300"
                            type="file" name="note_img" /><br>
                        <div class="flex align-center justify-center">
                            <x-primary-button type="submit" class="w-32 flex self-center justify-center">
                                {{ __('Editar') }}
                            </x-primary-button>
                            <a href="/dashboard/search"
                                class="flex self-center justify-center ml-4 items-center w-32 px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150">
                                Voltar
                            </a>
                        </div>

                    </form>
                    <form :action="{{ route('search.delete', $nota->id) }}" method="POST"
                        class="flex w-full justify-center align-center">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"
                            class="flex self-center justify-center mt-2 items-center w-32 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150 self-center">
                            Deletar
                        </button>
                    </form>
                    <div class="flex w-full align-center justify-center">
                        @if (session('success'))
                            <span class="flex text-lime-500 font-semibold text-l self-center mt-3">Nota editada com
                                sucesso!</span>
                        @endif
                        @if ($errors->any())
                            <span class="text-red-600 font-semibold text-l self-center mt-3">Por favor, preencha todos
                                os campos
                                corretamente.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
