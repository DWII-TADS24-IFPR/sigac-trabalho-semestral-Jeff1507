<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar curso') }}
        </h2>
    </x-slot>
    <section class="flex items-center justify-center">
        <form action="{{ route('curso.store') }}" method="POST" class="w-full sm:w-96 shadow-sm sm:border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <x-title>
                Novo Curso
            </x-title>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="nome" :value="__('Nome do Curso')" />
                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="sigla" :value="__('Sigla do Curso')" />
                <x-text-input id="sigla" class="block mt-1 w-full" type="text" name="sigla" :value="old('sigla')" required autofocus />
                <x-input-error :messages="$errors->get('sigla')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="total_horas" :value="__('Total de Horas')" />
                <x-text-input id="total_horas" class="block mt-1 w-full" type="number" step="0.01" name="total_horas" :value="old('total_horas')" required autofocus />
                <x-input-error :messages="$errors->get('total_horas')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="nivel_id" :value="__('Nível de Ensino')" />
                <x-select :options="$niveis" name="nivel_id" label="Selecione um nível"/>
                <x-input-error :messages="$errors->get('nivel_id')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="eixo_id" :value="__('Eixo')" />
                <x-select :options="$eixos" name="eixo_id" label="Selecione um eixo"/>
                <x-input-error :messages="$errors->get('eixo_id')" class="mt-2" />
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('curso.index') }}'" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Adicionar
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>
