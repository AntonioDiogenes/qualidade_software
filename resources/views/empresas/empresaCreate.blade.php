<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nova Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('empresas.store') }}">
                        @csrf

                        {{-- Razão Social --}}
                        <div>
                            <x-input-label for="razao_social" :value="__('Razão Social')" />
                            <x-text-input id="razao_social" class="block mt-1 w-full" type="text" name="razao_social" :value="old('razao_social')" required autofocus autocomplete="organization" maxlength="255" />
                            <x-input-error :messages="$errors->get('razao_social')" class="mt-2" />
                        </div>

                        {{-- Nome Fantasia --}}
                        <div class="mt-4">
                            <x-input-label for="nome_fantasia" :value="__('Nome Fantasia')" />
                            <x-text-input id="nome_fantasia" class="block mt-1 w-full" type="text" name="nome_fantasia" :value="old('nome_fantasia')" autocomplete="organization-title" maxlength="255" />
                            <x-input-error :messages="$errors->get('nome_fantasia')" class="mt-2" />
                        </div>

                        {{-- CNPJ --}}
                        <div class="mt-4">
                            <x-input-label for="cnpj" :value="__('CNPJ')" />
                            <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" placeholder="00.000.000/0000-00" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                        </div>

                        {{-- Endereço --}}
                        <div class="mt-4">
                            <x-input-label for="endereco" :value="__('Endereço')" />
                            <textarea id="endereco" name="endereco" rows="3" class="block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm" required autocomplete="street-address">{{ old('endereco') }}</textarea>
                            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('empresas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-4">
                                {{ __('Cancelar') }}
                            </a>
                            <x-primary-button>
                                {{ __('Salvar Empresa') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Incluindo jQuery via CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- Incluindo jQuery Mask Plugin via CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            // Aplica a máscara para CNPJ
            $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        });
    </script>
</x-app-layout>
