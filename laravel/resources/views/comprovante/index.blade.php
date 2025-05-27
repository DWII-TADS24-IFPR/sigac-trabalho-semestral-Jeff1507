<x-app-layout>
    <section class="space-y-6">
        
        @if ($comprovantes->isEmpty())
            <x-not-found>
                Nenhum Comprovante cadastrado!
                <x-button onclick="window.location.href='{{ route('comprovante.create') }}'">
                    Criar novo comprovante
                </x-button>
            </x-not-found>
        @else
        <div class="flex items-center justify-between">
            <x-title>
                Comprovantes
            </x-title>
            <x-button onclick="window.location.href='{{ route('comprovante.create') }}'">
                Adicionar Comprovante
            </x-button>
        </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">ATIVIDADE</th>
                            <th scope="col" class="px-6 py-4">Total de Horas</th>
                            <th scope="col" class="px-6 py-4">CATEGORIA</th>
                            <th scope="col" class="px-6 py-4">ALUNO PARTICIPANTE</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comprovantes as $comprovante)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $comprovante->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $comprovante->atividade }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $comprovante->horas }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $comprovante->categoria->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $comprovante->aluno->user->name }}
                                </td>
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                    <x-link class="text-blue-300" href="{{ route('comprovante.show', $comprovante->id) }}">
                                        Ver
                                    </x-link>
                                    <x-link>
                                        Editar
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