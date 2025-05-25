<x-app-layout>
    <section class="space-y-6">
        
        @if ($alunos->isEmpty())
            <x-not-found>
                Nenhum Aluno cadastrado!
                <x-button onclick="window.location.href='{{ route('aluno.create') }}'">
                    Cadastrar aluno
                </x-button>
            </x-not-found>
        @else
        <div class="flex items-center justify-between">
            <x-title>
                Alunos
            </x-title>
            <x-button onclick="window.location.href='{{ route('aluno.create') }}'">
                Adicionar Aluno
            </x-button>
        </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">nome</th>
                            <th scope="col" class="px-6 py-4">email</th>
                            <th scope="col" class="px-6 py-4">CPF</th>
                            <th scope="col" class="px-6 py-4">curso</th>
                            <th scope="col" class="px-6 py-4">turma</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $aluno->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $aluno->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $aluno->user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $aluno->cpf }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $aluno->curso->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $aluno->turma->ano }}
                                </td>
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                   <x-link href="{{ route('aluno.show', $aluno->id) }}" class="text-blue-300">
                                        Ver
                                   </x-link>
                                   <x-link href="{{ route('aluno.edit', $aluno->id) }}">
                                        Editar
                                    </x-link>
                                    <x-delete-button :action="route('aluno.destroy', $aluno->id)" modalId="delete-aluno-{{ $aluno->id }}"/>
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