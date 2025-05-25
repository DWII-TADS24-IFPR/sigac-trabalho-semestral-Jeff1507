<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar turma') }}
        </h2>
    </x-slot>
    <section class="flex items-center justify-center">
        <form action="{{ route('turma.store') }}" method="POST" class="w-full sm:w-96 shadow-sm sm:border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <x-title>
                Nova Turma
            </x-title>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="ano" :value="__('Ano da Turma')" />
                <x-text-input id="ano" class="block mt-1 w-full" type="number" name="ano" :value="old('ano')" required autofocus />
                <x-input-error :messages="$errors->get('ano')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="curso_id" :value="__('Curso da Turma')" />
                <x-select :options="$cursos" name="curso_id" label="Selecione um curso"/>
                <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('turma.index') }}'" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Adicionar
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>
