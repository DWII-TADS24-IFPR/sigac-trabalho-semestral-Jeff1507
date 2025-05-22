@extends('layouts.app')

@section('title', 'SIGAC - Níveis de Ensino')

@section('content')
    <section class="flex flex-col gap-8 items-center justify-center">
        <form action="{{ route('nivel.store') }}" method="POST" class="w-96 shadow-sm border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <h1 class="text-xl font-medium text-white tracking-wider">
                Novo Nível de Ensino
            </h1>
            <div class="w-full flex flex-col space-y-1.5">
                <label for="nome" class="text-sm tracking-wide text-white">Nome do Nível*</label>
                <input type="text" id="nome" class="p-2 border border-zinc-400 text-white">
            </div>
            @if ($errors->any())
                <x-alert type="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-alert>
            @endif
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('nivel.index') }}'" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Adicionar
                </x-button>
            </div>
        </form>
        
    </section>
@endsection