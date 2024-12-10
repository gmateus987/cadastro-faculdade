<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto w-1/3 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('dashboard.create-user') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="mt-4 flex align-center">
                            <input id="is_admin" class="mr-2 p-2 w-2 h-3 rounded-none self-center border-gray-300 focus:border-green-600 focus:ring-0 hover:checked:bg-green-600 rounded-md shadow-sm checked:bg-green-600 focus:border-2 focus:checked:bg-green-600" type="checkbox"
                            name="is_admin" value="1" autocomplete="new-password" >
                            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
                                <x-input-label for="is_admin" :value="__('Vai ser um administrador?')" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Registrar') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <div class="flex w-full align-center justify-center mt-1">
                        @if (session('success'))
                            <span class="flex text-lime-500 font-semibold text-xl self-center">Usuário criado com sucesso!</span>
                        @endif
                        @if ($errors->any())
                            <span class="text-red-600 font-semibold text-xl">Por favor, preencha todos os campos
                                corretamente.</span>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
