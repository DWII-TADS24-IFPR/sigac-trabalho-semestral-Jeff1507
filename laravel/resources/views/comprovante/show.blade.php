<x-app-layout>
    <section class="flex items-center justify-center">
        <div class="w-full sm:max-w-xl shadow-sm border border-dashed border-[#49454F] flex flex-col gap-6 sm:gap-10 p-4 sm:p-8">
            <x-title>
                {{ $comprovante->atividade }}
            </x-title>
            <div class="grid grid-cols-2 gap-8">
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Responsável
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $comprovante->user->name }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Total de Horas
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $comprovante->horas }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Categoria
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $comprovante->categoria->nome }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Aluno Participante
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $comprovante->aluno->user->name }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Data de Criação
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $comprovante->created_at }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Última Atualização
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $comprovante->updated_at }}
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-start gap-4">
                <x-button variant="outlined" onclick="window.location.href='{{ route('comprovante.index') }}'">
                    Voltar
                </x-button>
                <a href="{{ route('comprovantes.declaracao', $comprovante->id) }}" target="_blank" class="btn btn-primary">
                    <x-button>
                        Gerar Declaração (PDF)
                    </x-button>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>