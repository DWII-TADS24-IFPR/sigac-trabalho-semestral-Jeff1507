<x-app-layout>
    <section class="space-y-6">
        
        @if ($eixos->isEmpty())
            <x-not-found>
                Nenhum Eixo cadastrado!
                <x-button onclick="window.location.href='{{ route('eixo.create') }}'">
                    Criar novo eixo
                </x-button>
            </x-not-found>
        @else
        <div class="flex items-center justify-between">
            <x-title>
                Eixos
            </x-title>
            <x-button onclick="window.location.href='{{ route('eixo.create') }}'">
                Adicionar Eixo
            </x-button>
        </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-zinc-300 border border-gray-500">
                    <thead class="text-xs text-white uppercase border border-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">id</th>
                            <th scope="col" class="px-6 py-4">nome</th>
                            <th scope="col" class="px-6 py-4">Data de criação</th>
                            <th scope="col" class="px-6 py-4">Última atualização</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eixos as $eixo)
                            <tr class="border-b border-gray-500">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $eixo->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $eixo->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $eixo->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($eixo->updated_at)
                                        {{ $eixo->updated_at }}
                                    @else
                                        <span>
                                            ---
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 inline-flex items-center gap-8">
                                    <x-link href="{{ route('eixo.edit', $eixo->id) }}">
                                        Editar
                                    </x-link>
                                    <x-delete-button :action="route('eixo.destroy', $eixo->id)" modalId="delete-eixo-{{ $eixo->id }}"/>
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