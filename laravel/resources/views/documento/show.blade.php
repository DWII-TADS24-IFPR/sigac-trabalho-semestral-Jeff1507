<x-app-layout>
    <section class="flex items-center justify-center">
        <div class="w-full sm:max-w-xl shadow-sm border border-dashed border-[#49454F] flex flex-col gap-6 sm:gap-10 p-4 sm:p-8">
            <x-title>
                {{ $documento->descricao }}
            </x-title>
            <div class="grid grid-cols-2 gap-8">
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Nome do Aluno
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->user->name }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Status
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        @if ($documento->status)
                            {{ $documento->status }}
                        @else
                            ---
                        @endif
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Total de Horas Solicitadas
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->horas_in }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Total de Horas Aceitas
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->horas_out }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Categoria do Documento
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->categoria->nome }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Comentário
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        @if ($documento->comentario)
                            {{ $documento->comentario }}
                        @else
                            ---
                        @endif
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Data de Criação
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->created_at }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Última Atualização
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->updated_at }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row items-center justify-center sm:justify-start gap-2 sm:gap-4">
                <x-button class="w-full sm:w-auto" variant="outlined" onclick="window.location.href='{{ route('documento.index') }}'">
                    Voltar
                </x-button>
                <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto">
                    <x-button variant="tonal" class="w-full sm:w-auto">
                        Ver Documento (PDF)
                    </x-button>
                </a>
                <x-button class="w-full sm:w-auto">
                    Validar
                </x-button>
            </div>
        </div>
    </section>
</x-app-layout>