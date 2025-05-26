<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitar horas afins') }}
        </h2>
    </x-slot>
    <section class="flex items-center justify-center">
        <form action="" method="POST" enctype="multipart/form-data" class="w-full sm:w-96 shadow-sm sm:border border-[#49454F] flex flex-col gap-8 px-6 py-4">
            @csrf
            <x-title>
                Solicitar Horas Complementares
            </x-title>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="descricao" :value="__('Descrição do Documento')" />
                <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required autofocus />
                <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="horas_in" :value="__('Horas Solicitadas')" />
                <x-text-input id="horas_in" class="block mt-1 w-full" type="number" name="horas_in" :value="old('horas_in')" required autofocus />
                <x-input-error :messages="$errors->get('horas_in')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <x-input-label for="categoria_id" :value="__('Categoria do documento')" />
                <x-select :options="$categorias" name="categoria_id" label="Selecione uma categoria"/>
                <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
            </div>
            <div class="w-full flex flex-col space-y-1.5">
                <label for="url" class="flex flex-col items-center justify-center w-full h-full border-2 border-zinc-400 border-dashed rounded-sm cursor-pointer">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 px-4">
                        <x-heroicon-o-document-arrow-up class="w-8 h-8 mb-4 text-[#D0BCFF]"/>
                        <p class="mb-2 text-sm text-zinc-400 text-center font-semibold">
                            Clique aqui para enviar o documento.
                        </p>
                        <p id="nome_documento" class="text-sm text-zinc-200 mt-2 hidden"></p>
                    </div>
                    <input class="hidden" type="file" name="url" id="url" accept="application/pdf"/>
                </label>
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>
            <div class="w-full flex items-center justify-end gap-4">
                <x-button type="button" variant="text">
                    Voltar
                </x-button>
                <x-button type="submit">
                    Solicitar
                </x-button>
            </div>
        </form>
    </section>
    <script>
    document.getElementById('url').addEventListener('change', function (e) {
        const fileName = e.target.files[0]?.name || 'Nenhum arquivo selecionado';
        const label = document.getElementById('nome_documento');
        label.textContent = fileName;
        label.classList.remove('hidden');
    });
    </script>
</x-app-layout>