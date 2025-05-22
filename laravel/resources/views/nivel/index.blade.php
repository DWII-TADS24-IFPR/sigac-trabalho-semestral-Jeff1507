@extends('layouts.app')

@section('title', 'SIGAC - Níveis de Ensino')

@section('content')
    <section class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl text-white font-bold tracking-wider">
                Níveis de Ensino
            </h1>
            <x-button type="tonal">
                Adicionar Nível
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
                    @foreach($niveis as $nivel)
                        <tr class="border-b border-gray-500">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                {{ $nivel->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $nivel->nome }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $nivel->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($nivel->updated_at)
                                    {{ $nivel->updated_at }}
                                @else
                                    <span>
                                        ---
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex items-center gap-8">
                                <x-link href="{{ route('home') }}">
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
    </section>
@endsection