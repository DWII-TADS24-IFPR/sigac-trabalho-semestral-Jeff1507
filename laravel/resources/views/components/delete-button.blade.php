<button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $modalId }}')" class="text-red-400 text-sm tracking-wide font-medium cursor-pointer flex items-center justify-center hover:underline">
    Remover
</button>

<x-modal name="{{ $modalId }}" focusable>
    <div class="p-6 flex flex-col gap-4">
        <h2 class="text-xl font-medium tracking-wide">
            Deseja excluir esse item?
        </h2>
        <p class="text-sm text-zinc-400">
            Ao excluir esse item, você também removerá todos os dados relacionados a este item.
        </p>
        <form method="POST" action="{{ $action }}" class="w-full flex gap-2 items-center justify-end">
            @csrf
            @method('DELETE')
            <x-button type="button" variant="text" x-on:click="$dispatch('close')">
                Cancelar
            </x-button>
            <x-button type="submit">
                Excluir
            </x-button>
        </form>
    </div>
</x-modal>
