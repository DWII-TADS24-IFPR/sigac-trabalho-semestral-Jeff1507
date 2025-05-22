@extends('layouts.app')

@section('title', 'SIGAC - Níveis de Ensino')

@section('content')
    <section class="flex items-center justify-center">
        <form action="{{ route('nivel.store') }}" method="POST" class="w-90 shadow-sm border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <h1 class="text-xl font-medium text-white tracking-wider">
                Novo Nível de Ensino
            </h1>
            <div class="w-full flex flex-col space-y-1.5">
                <label for="nome" class="text-sm tracking-wide text-white">Nome do Nível*</label>
                <input type="text" name="nome" id="nome" required class="p-2 border border-zinc-400 text-white">
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.history.back();" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Adicionar
                </x-button>
            </div>
        </form>
    </section>
@endsection