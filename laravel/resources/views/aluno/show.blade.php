<x-app-layout>
    <section class="flex items-center justify-center">
        <div class="w-full sm:max-w-xl shadow-sm border border-dashed border-[#49454F] flex flex-col gap-6 sm:gap-10 p-4 sm:p-8">
            <div class="w-full flex flex-col items-center justify-start gap-2">
                <x-heroicon-s-user-circle class="w-24 h-24 text-zinc-200"/>
                <x-title>
                    {{ $aluno->user->name }}
                </x-title>
            </div>
            <div class="grid grid-cols-2 gap-8 w-full">
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Email
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $aluno->user->email }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        CPF
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $aluno->cpf }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Curso
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $aluno->curso->nome }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Turma
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $aluno->turma->ano }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Data de Criação da Conta
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $aluno->created_at }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Última Atualização da Conta
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $aluno->created_at }}
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-start">
                <x-button variant="outlined" onclick="window.location.href='{{ route('aluno.index') }}'">
                    Voltar
                </x-button>
            </div>
        </div>
    </section>
</x-app-layout>