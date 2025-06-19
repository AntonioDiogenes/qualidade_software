<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nova Pessoa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('pessoas.store') }}">
                        @csrf

                        {{-- Nome --}}
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            {{-- Adicionado maxlength e autocomplete --}}
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="name" maxlength="255" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        {{-- Email --}}
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            {{-- type="email" já fornece validação de formato. Adicionado autocomplete --}}
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Telefone --}}
                        <div class="mt-4">
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            {{-- Adicionado placeholder, maxlength e pattern para o input --}}
                            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" placeholder="(XX) 9XXXX-XXXX" maxlength="15" autocomplete="tel" />
                            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                        </div>

                        {{-- Data de Nascimento --}}
                        <div class="mt-4">
                            <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
                            {{-- type="date" já fornece validação de formato e um seletor de data --}}
                            <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')" autocomplete="bday" />
                            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                        </div>

                        {{-- Observações --}}
                        <div class="mt-4">
                            <x-input-label for="observacoes" :value="__('Observações')" />
                            {{-- Textarea não precisa de type. Adicionado autocomplete para multiline --}}
                            <textarea id="observacoes" name="observacoes" rows="4" class="block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm" autocomplete="off">{{ old('observacoes') }}</textarea>
                            <x-input-error :messages="$errors->get('observacoes')" class="mt-2" />
                        </div>
                        
                        {{-- Seleção de Empresa --}}
                        <div class="mt-4">
                            <x-input-label for="empresa_id" :value="__('Empresa')" />
                            <select id="empresa_id" name="empresa_id" class="block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm">
                                <option value="">{{ __('Nenhuma Empresa (Opcional)') }}</option>
                                @foreach($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" {{ old('empresa_id') == $empresa->id ? 'selected' : '' }}>
                                        {{ $empresa->razao_social }} ({{ $empresa->nome_fantasia ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('empresa_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('pessoas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-4">
                                {{ __('Cancelar') }}
                            </a>
                            <x-primary-button>
                                {{ __('Salvar Pessoa') }}
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
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</x-app-layout>
