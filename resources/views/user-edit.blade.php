<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto w-1/3 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form :action="{{ route('users.update', $user->id) }}" method="POST"
                        class="mb-2 flex flex-col justify-center border-0 w-full">
                        @csrf
                        @method('PUT')

                        <br>
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" class="block mt-1 w-64" type="text" name="name"
                            value="{{ $user->name }}" autofocus />
                        <br>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-64" type="email" name="email"
                            value="{{ $user->email }}" />
                        <br>
                        <x-input-label for="password" :value="__('Senha')" />
                        <x-text-input id="password" class="block mt-1 w-64" type="password" name="password"
                            minlength="8" maxlength="16" />
                        <div class="mt-4 flex align-center">
                            <input id="is_admin"
                                class="mr-2 p-2 w-2 h-3 rounded-none self-center border-gray-300 focus:border-green-600 focus:ring-0 hover:checked:bg-green-600 rounded-md shadow-sm checked:bg-green-600 focus:border-2 focus:checked:bg-green-600"
                                type="checkbox" name="is_admin" value="1">
                            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
                            <x-input-label for="is_admin" :value="__('Vai ser um administrador?')" />
                        </div>
                        <br>
                        <div class="flex align-center justify-center">
                            <x-primary-button type="submit" class="w-32 flex self-center justify-center">
                                {{ __('Editar') }}
                            </x-primary-button>
                            <a href="{{ route('users.index') }}"
                                class="flex self-center justify-center ml-4 items-center w-32 px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150">
                                Voltar
                            </a>
                        </div>

                    </form>
                    <form :action="{{ route('users.delete', $user->id) }}" method="POST" class="flex w-full justify-center align-center">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"
                            class="flex self-center justify-center mt-2 items-center w-32 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150 self-center">
                            Deletar
                        </button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
