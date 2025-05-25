<x-app-layout>
    <section class="space-y-6">
        
        @if ($turmas->isEmpty())
            <x-not-found>
                Nenhuma Turma cadastrada!
                <x-button onclick="window.location.href='{{ route('turma.create') }}'">
                    Criar nova turma
                </x-button>
            </x-not-found>
        @else
        <div class="flex items-center justify-between">
            <x-title>
                Turmas
            </x-title>
            <x-button onclick="window.location.href='{{ route('turma.create') }}'">
                Adicionar Turma
            </x-button>
        </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">ano</th>
                            <th scope="col" class="px-6 py-4">Curso</th>
                            <th scope="col" class="px-6 py-4">Data de criação</th>
                            <th scope="col" class="px-6 py-4">Última atualização</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turmas as $turma)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $turma->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $turma->ano }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $turma->curso->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $turma->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($turma->updated_at)
                                        {{ $turma->updated_at }}
                                    @else
                                        <span>
                                            ---
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                    <x-link href="{{ route('turma.edit', $turma->id) }}">
                                        Editar
                                    </x-link>
                                    <x-delete-button :action="route('turma.destroy', $turma->id)" modalId="delete-turma-{{ $turma->id }}"/>
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