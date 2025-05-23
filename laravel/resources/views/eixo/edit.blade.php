<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar eixo') }}
        </h2>
    </x-slot>
    <section class="flex items-center justify-center">
        <form action="{{ route('eixo.update', $eixo->id) }}" method="POST" class="w-full sm:w-96 shadow-sm sm:border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            @method('PUT')

            <x-title>
                Editar Eixo
            </x-title>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="nome" :value="__('Nome do Eixo')" />
                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" value="{{ old('nome', $eixo->nome) }}" required autofocus />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('eixo.index') }}'" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Atualizar
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>