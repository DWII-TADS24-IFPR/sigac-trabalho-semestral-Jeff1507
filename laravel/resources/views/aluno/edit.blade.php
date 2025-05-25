<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar aluno') }}
        </h2>
    </x-slot>
    <section class="flex items-center justify-center">
        <form action="{{ route('aluno.update', $aluno->id) }}" method="POST" class="w-full sm:w-96 shadow-sm sm:border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            @method('PUT')

            <x-title>
                Editar Aluno
            </x-title>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="nome" :value="__('Nome do Aluno')" />
                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" value="{{ old('nome', $aluno->user->name) }}" required autofocus />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="email" :value="__('Email do Aluno')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $aluno->user->email) }}" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="cpf" :value="__('CPF do Aluno')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" value="{{ old('cpf', $aluno->cpf) }}" required autofocus />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="password" :value="__('Senha')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                autocomplete="new-password" 
                />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="curso_id" :value="__('Curso')" />
                <x-select :options="$cursos" name="curso_id" :selected="old('curso_id', $aluno->curso_id)" label="Selecione um curso"/>
                <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="turma_id" :value="__('Turma')" />
                <select name="turma_id" id="turma_id" class="border-zinc-400 bg-transparent text-white focus:border-[#D0BCFF] focus:ring-[#D0BCFF] rounded-sm shadow-sm">
                    <option value="" class="bg-zinc-900 rounded-none">
                        Selecione uma turma
                    </option>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}" {{ old('turma_id', $aluno->turma_id) == $turma->id ? 'selected' : '' }} class="bg-zinc-900">
                            {{ $turma->ano }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('turma_id')" class="mt-2" />
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" onclick="window.location.href='{{ route('aluno.index') }}'" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Atualizar
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>
