<div class="sm:border border-zinc-400 border-dashed w-full py-8 flex items-center justify-center">
    <div class="flex flex-col gap-4 items-center justify-center text-zinc-400">
        <x-heroicon-o-home class="w-24 h-24" />
        <p class="text-center text-lg font-medium">
            {{ $slot }}
        </p>
        <x-button variant="text">
            Adicionar Nível
        </x-button>
    </div>
</div>