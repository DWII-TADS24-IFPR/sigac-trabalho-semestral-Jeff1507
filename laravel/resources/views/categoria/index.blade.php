<x-app-layout>
    <section class="space-y-6">
        
        @if ($categorias->isEmpty())
            <x-not-found>
                Nenhuma Categoria cadastrada!
                <x-button onclick="window.location.href='{{ route('categoria.create') }}'">
                    Criar nova categoria
                </x-button>
            </x-not-found>
        @else
        <div class="flex items-center justify-between">
            <x-title>
                Categorias de Documento
            </x-title>
            <x-button onclick="window.location.href='{{ route('categoria.create') }}'">
                Adicionar Categoria
            </x-button>
        </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">nome</th>
                            <th scope="col" class="px-6 py-4">Máximo de Horas</th>
                            <th scope="col" class="px-6 py-4">Curso</th>
                            <th scope="col" class="px-6 py-4">Data de criação</th>
                            <th scope="col" class="px-6 py-4">Última atualização</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $categoria->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $categoria->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $categoria->maximo_horas }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $categoria->curso->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $categoria->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($categoria->updated_at)
                                        {{ $categoria->updated_at }}
                                    @else
                                        <span>
                                            ---
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                    <x-link href="{{ route('categoria.edit', $categoria->id) }}">
                                        Editar
                                    </x-link>
                                    <x-delete-button :action="route('categoria.destroy', $categoria->id)" modalId="delete-categoria-{{ $categoria->id }}"/>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if (session('success'))
            <x-alert type="success">
                {{ session('success') }}
            </x-alert>
        @elseif (session('error'))
            <x-alert type="error">
                {{ session('error') }}
            </x-alert>
        @endif
    </section>
</x-app-layout>