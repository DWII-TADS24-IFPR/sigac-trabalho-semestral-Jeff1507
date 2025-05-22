<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar nivel de ensino') }}
        </h2>
    </x-slot>
    <section class="flex flex-col gap-8 items-center justify-center py-8">
        <form action="{{ route('nivel.store') }}" method="POST" class="w-96 shadow-sm border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <h1 class="text-xl font-medium text-white tracking-wider">
                Novo Nível de Ensino
            </h1>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="nome" :value="__('Nome do nível')" />
                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>
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
</x-app-layout>
