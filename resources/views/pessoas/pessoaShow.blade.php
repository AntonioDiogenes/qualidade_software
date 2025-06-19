<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Pessoa: ') . $pessoa->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Nome:') }}</p>
                        <p class="text-md">{{ $pessoa->nome }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Email:') }}</p>
                        <p class="text-md">{{ $pessoa->email }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Telefone:') }}</p>
                        <p class="text-md">{{ $pessoa->telefone ?? 'Não informado' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Data de Nascimento:') }}</p>
                        <p class="text-md">{{ $pessoa->data_nascimento ? $pessoa->data_nascimento->format('d/m/Y') : 'Não informado' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Observações:') }}</p>
                        <p class="text-md">{{ $pessoa->observacoes ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Empresa:') }}</p>
                        <p class="text-md">
                            @if ($pessoa->empresa)
                                {{ $pessoa->empresa->razao_social }} ({{ $pessoa->empresa->nome_fantasia ?? 'N/A' }})
                            @else
                                {{ __('Não associada a uma empresa') }}
                            @endif
                        </p>
                    </div>

                    @if ($pessoa->trashed())
                        <div class="mb-4 text-red-500">
                            <p class="text-lg font-semibold">{{ __('Excluído em:') }}</p>
                            <p class="text-md">{{ $pessoa->deleted_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    @endif

                    <div class="flex items-center mt-6">
                        <a href="{{ route('pessoas.edit', $pessoa) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-4">
                            {{ __('Editar') }}
                        </a>
                        <a href="{{ route('pessoas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Voltar para a Lista') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
