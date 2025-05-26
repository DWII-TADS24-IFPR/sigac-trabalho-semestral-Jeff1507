<x-app-layout>
    <section class="space-y-6">

        @if ($documentos->isEmpty())
            <x-not-found>
                Nenhuma solicitação registrada!
            </x-not-found>
        @else
            <div class="flex items-center justify-between">
                <x-title>
                    Solicitações de Horas Complementares
                </x-title>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">NOME DO ALUNO</th>
                            <th scope="col" class="px-6 py-4">DESCRIÇÃO</th>
                            <th scope="col" class="px-6 py-4">HORAS SOLICITADAS</th>
                            <th scope="col" class="px-6 py-4">STATUS</th>
                            <th scope="col" class="px-6 py-4">HORAS ACEITAS</th>
                            <th scope="col" class="px-6 py-4">COMENTÁRIO</th>
                            <!--<th scope="col" class="px-6 py-4">DOCUMENTO</th>-->
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $documento)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $documento->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $documento->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $documento->descricao }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $documento->horas_in }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($documento->status)
                                        {{ $documento->status }}
                                    @else
                                        <span>
                                            ---
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $documento->horas_out }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($documento->comentario)
                                        {{ $documento->comentario }}
                                    @else
                                        <span>
                                            ---
                                        </span>
                                    @endif
                                </td>
                                <!--<td class="px-6 py-4">
                                    <a href="" class="line-clamp-1 w-40 text-indigo-300 hover:underline">
                                        {{ $documento->url }}
                                    </a>
                                </td>-->
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                    <x-link class="text-blue-300">
                                        Ver
                                    </x-link>
                                    <x-link class="text-green-300">
                                        Validar
                                    </x-link>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</x-app-layout>