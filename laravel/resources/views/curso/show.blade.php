<x-app-layout>
    <section class="flex items-center justify-center">
        <div class="w-full sm:max-w-xl shadow-sm border border-dashed border-[#49454F] flex flex-col gap-6 sm:gap-10 p-4 sm:p-8">
            <x-title>
                {{ $curso->nome }}
            </x-title>
            <div class="grid grid-cols-2 gap-8">
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Sigla
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $curso->sigla }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Total de Horas
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $curso->total_horas }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Nível de Ensino
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $curso->nivel->nome }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Eixo
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $curso->eixo->nome }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Data de Criação
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $curso->created_at }}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <h3 class="text-base sm:text-xl text-zinc-200">
                        Última Atualização
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $curso->updated_at }}
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-start gap-4">
                <x-button variant="outlined" onclick="window.location.href='{{ route('curso.index') }}'">
                    Voltar
                </x-button>
            </div>
        </div>
    </section>
</x-app-layout>