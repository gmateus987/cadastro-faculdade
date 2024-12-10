<div class="py-12">
    <div class="max-w-7xl mx-auto w-1/3 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
            <div class="p-6 text-gray-900 w-full">
                <div>
                    <x-input-label for="user" :value="__('Nome')" />
                    <x-text-input id="user" class="block mt-1 w-full" type="text" name="user"
                        value="{{ $user->name }}" readonly />
                </div>
                <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data"
                    class="mb-2 flex flex-col justify-center">
                    @csrf
                    <br>
                    <x-input-label for="value" :value="__('Valor')" />
                    <x-text-input id="value" class="block mt-1 w-64" type="text" step="any" name="value"
                        :value="old('value')" autofocus /><br>
                    <x-input-label for="date" :value="__('Data')" />
                    <x-text-input id="date" class="block mt-1 w-64" type="date" name="date"
                        :value="old('date')" /><br>
                    <x-input-label for="reason" :value="__('Motivo')" />
                    <select name="reason" id="reason"
                        class="border-gray-300 w-auto focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm mt-1">
                        <option value selected disabled>Selecione um item</option>
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
                    <x-primary-button class="w-32 flex self-center justify-center">
                        {{ __('Cadastrar') }}
                    </x-primary-button>
                </form>
                <div class="flex w-full align-center justify-center">
                    @if (session('success'))
                        <span class="flex text-lime-500 font-semibold text-xl self-center">Nota criada com
                            sucesso!</span>
                    @endif
                    @if ($errors->any())
                        <span class="text-red-600 font-semibold text-xl">Por favor, preencha todos os campos
                            corretamente.</span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
