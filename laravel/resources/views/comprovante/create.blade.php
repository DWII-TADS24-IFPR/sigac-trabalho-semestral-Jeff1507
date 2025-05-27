<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar comprovante') }}
        </h2>
    </x-slot>
    <section class="flex items-center justify-center">
        <form action="{{ route('comprovante.store') }}" method="POST" class="w-full sm:w-96 shadow-sm sm:border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <x-title>
                Novo Comprovante
            </x-title>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="atividade" :value="__('Atividade do Comprovante')" />
                <x-text-input id="atividade" class="block mt-1 w-full" type="text" name="atividade" :value="old('atividade')" required autofocus />
                <x-input-error :messages="$errors->get('atividade')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="horas" :value="__('Total de Horas')" />
                <x-text-input id="horas" class="block mt-1 w-full" type="number" name="horas" :value="old('horas')" required autofocus />
                <x-input-error :messages="$errors->get('horas')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="categoria_id" :value="__('Categoria do Comprovante')" />
                <x-select :options="$categorias" name="categoria_id" label="Selecione uma categoria"/>
                <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="aluno_id" :value="__('Aluno Participante')" />
                <select name="aluno_id" id="aluno_id" class="border-zinc-400 bg-transparent text-white focus:border-[#D0BCFF] focus:ring-[#D0BCFF] rounded-sm shadow-sm">
                    <option value="" class="bg-zinc-900 rounded-none">
                        Selecione um aluno
                    </option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" class="bg-zinc-900">
                            {{ $aluno->user->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('aluno_id')" class="mt-2" />
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('comprovante.index') }}'" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Adicionar
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>
