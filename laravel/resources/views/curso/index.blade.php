<x-app-layout>
    <section class="space-y-6">
        
        @if ($cursos->isEmpty())
            <x-not-found>
                Nenhum Curso cadastrado!
                <x-button onclick="window.location.href='{{ route('curso.create') }}'">
                    Criar novo curso
                </x-button>
            </x-not-found>
        @else
        <div class="flex items-center justify-between">
            <x-title>
                Cursos
            </x-title>
            <x-button onclick="window.location.href='{{ route('curso.create') }}'">
                Adicionar Curso
            </x-button>
        </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">nome</th>
                            <th scope="col" class="px-6 py-4">Sigla</th>
                            <th scope="col" class="px-6 py-4">Total de Horas</th>
                            <th scope="col" class="px-6 py-4">Nível</th>
                            <th scope="col" class="px-6 py-4">Eixo</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $curso->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $curso->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $curso->sigla }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $curso->total_horas }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $curso->nivel->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $curso->eixo->nome }}
                                </td>
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                    <x-link class="text-blue-300">
                                        Ver
                                    </x-link>
                                    <x-link>
                                        Editar
                                    </x-link>
                                    <x-link class="text-red-400">
                                        Remover
                                    </x-link>
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