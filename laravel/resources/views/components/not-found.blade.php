<div class="sm:border border-zinc-400 border-dashed w-full py-8 flex items-center justify-center">
    <div class="flex flex-col gap-4 items-center justify-center text-zinc-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-48 w-48" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L9 13.414l4.707-4.707z" clip-rule="evenodd" />
        </svg>
        <p class="text-center text-lg font-medium">
            {{ $slot }}
        </p>
        <x-button variant="text">
            Adicionar Nível
        </x-button>
    </div>
</div>