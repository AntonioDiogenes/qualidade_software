<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Empresa: ') . $empresa->razao_social }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('ID:') }}</p>
                        <p class="text-md">{{ $empresa->id }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Razão Social:') }}</p>
                        <p class="text-md">{{ $empresa->razao_social }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Nome Fantasia:') }}</p>
                        <p class="text-md">{{ $empresa->nome_fantasia ?? 'Não informado' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('CNPJ:') }}</p>
                        <p class="text-md">{{ $empresa->cnpj }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Endereço:') }}</p>
                        <p class="text-md">{{ $empresa->endereco }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Criado em:') }}</p>
                        <p class="text-md">{{ $empresa->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">{{ __('Última Atualização:') }}</p>
                        <p class="text-md">{{ $empresa->updated_at->format('d/m/Y H:i:s') }}</p>
                    </div>

                    @if ($empresa->trashed())
                        <div class="mb-4 text-red-500">
                            <p class="text-lg font-semibold">{{ __('Excluído em:') }}</p>
                            <p class="text-md">{{ $empresa->deleted_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    @endif

                    <div class="flex items-center mt-6">
                        <a href="{{ route('empresas.edit', $empresa) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-4">
                            {{ __('Editar') }}
                        </a>
                        <a href="{{ route('empresas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Voltar para a Lista') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
