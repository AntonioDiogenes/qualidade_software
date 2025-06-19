<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listagem de Pessoas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Mensagens de sucesso/erro (serão exibidas com SweetAlert) --}}
                    {{-- Os blocos @if (session('success')) e @if (session('error')) foram removidos daqui,
                         pois a lógica será tratada pelo JavaScript abaixo. --}}

                    {{-- Botão para Nova Pessoa --}}
                    <div class="mb-6 flex justify-end">
                        <a href="{{ route('pessoas.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            {{ __('Nova Pessoa') }}
                        </a>
                    </div>

                    {{-- Tabela de Pessoas --}}
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        {{ __('ID') }}
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        {{ __('Nome') }}
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        {{ __('Email') }}
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        {{ __('Telefone') }}
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        {{ __('Ações') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pessoas as $pessoa)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pessoa->id }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $pessoa->nome }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $pessoa->email }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $pessoa->telefone ?? 'N/A' }}
                                        </td>
                                        <td class="py-4 px-6 flex items-center space-x-2">
                                             <button onclick="window.location='{{ route('pessoas.show', $pessoa) }}'" class="inline-flex items-center px-3 py-1 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                {{ __('Ver') }}
                                            </button>
                                            <button onclick="window.location='{{ route('pessoas.edit', $pessoa) }}'" class="inline-flex items-center px-3 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                {{ __('Editar') }}
                                            </button>
                                            <form action="{{ route('pessoas.destroy', $pessoa) }}" method="POST" class="inline-block delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    {{ __('Excluir') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td colspan="5" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">
                                            {{ __('Nenhuma pessoa encontrada.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Incluindo jQuery via CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    background: '#1f2937',
                    color: '#f9fafb'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: '{{ session('error') }}',
                    showConfirmButton: true,
                    background: '#1f2937',
                    color: '#f9fafb'
                });
            @endif

            $('.delete-form').on('submit', function (e) {
                e.preventDefault(); 
                var form = $(this); 

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Esta ação não pode ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar',
                    background: '#1f2937',
                    color: '#f9fafb'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.off('submit').submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
