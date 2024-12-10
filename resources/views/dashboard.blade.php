<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Início') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col justify-center text-center p-6 text-gray-900">
                    <h1 class="text-3xl font-semibold">Seja bem-vindo ao portal do colaborador!</h1>
                    <p class="font-semibold text-lg">Navegue pelo menu acima ou escolha uma ferramenta abaixo.</p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center justify-center w-full">
                        <div class="h-11 w-52 m-2">
                            <a href="/dashboard/create" class="flex border w-fit rounded-xl">
                                <div class="flex w-52 p-2 sm:justify-center items-center bg-green-500 rounded-xl">
                                    <x-create-note-img />
                                    <span class="ml-2 text-gray-900 font-semibold text-white">Criar Notas</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @if (Auth::check() && Auth::user()->is_admin)
                    <div class="flex flex-col items-center justify-center w-full">
                        <div class="h-11 w-52 m-2">
                            <a href="/dashboard/register-user" class="flex border w-fit rounded-xl ">
                                <div
                                    class="flex w-52 p-2 sm:justify-center items-center text-center items-center bg-green-500 border rounded-xl">
                                    <x-create-user-img />
                                    <span class="ml-2 text-gray-900 font-semibold text-white">Registrar Usuários</span>
                                </div>
                            </a>
                        </div>
                        <div class="h-11 w-52 m-2">
                            <a href="/dashboard/search" class="flex border w-fit rounded-xl">
                                <div
                                    class="flex w-52 p-2 sm:justify-center items-center bg-green-500 border rounded-xl">
                                    <x-search-note-img />
                                    <span class="ml-2 text-gray-900 font-semibold text-white">Pesquisar Notas</span>
                                </div>
                            </a>
                        </div>

                        <div class="h-11 w-52 m-2">
                            <a href="/dashboard/user-edit" class="flex border w-fit rounded-xl ">
                                <div
                                    class="flex w-52 p-2 sm:justify-center align-center text-center items-center bg-green-500 border rounded-xl">
                                    <x-edit-note-img />
                                    <span class="ml-2 text-gray-900 font-semibold text-white">Editar Usuários</span>
                                </div>
                            </a>
                        </div>
                        <div class="h-11 w-52 m-2">
                            <a href="/dashboard/register-user" class="flex border w-fit rounded-xl ">
                                <div
                                    class="flex w-52 p-2 sm:justify-center align-center text-center items-center bg-green-500 border rounded-xl">
                                    <x-report-img />
                                    <span class="ml-2 text-gray-900 font-semibold text-white">Relatório de
                                        Usuários</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
