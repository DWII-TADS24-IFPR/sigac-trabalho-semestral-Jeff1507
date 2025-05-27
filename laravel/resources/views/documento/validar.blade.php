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
                        Total de Horas Solicitadas
                    </h3>
                    <p class="text-xs sm:text-sm text-zinc-400">
                        {{ $documento->horas_in }}
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
                        Documento
                    </h3>
                    <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" rel="noopener noreferrer">
                        <x-button variant="tonal" class="gap-2">
                            <x-heroicon-o-document-arrow-down class="w-5 h-5"/>
                            Abrir PDF em outra guia
                        </x-button>
                    </a>
                </div>
            </div>
            <form action="{{ route('documento.finish', $documento->id) }}" method="POST" class="w-full flex flex-col gap-8">
                @csrf
                @method('PUT')

                <div class="w-full flex items-center justify-between gap-8">
                    <div class="w-full flex flex-col space-y-1.5">
                        <x-input-label for="status" :value="__('Status')" />
                        <select name="status" id="status" class="border-zinc-400 bg-transparent text-white focus:border-[#D0BCFF] focus:ring-[#D0BCFF] rounded-sm shadow-sm">
                            <option value="" class="bg-zinc-900 rounded-none">
                                Selecione uma opção
                            </option>
                            <option value="ACEITO" class="bg-zinc-900">
                                Aceitar
                            </option>
                            <option value="REJEITADO" class="bg-zinc-900">
                                Rejeitar
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    <!--<div class="w-1/2 flex flex-col space-y-1.5">
                        <x-input-label for="horas_out" :value="__('Horas Aceitas')" />
                        <x-text-input id="horas_out" class="block mt-1 w-full" type="number" name="horas_out" :value="old('horas_out')" autofocus />
                        <x-input-error :messages="$errors->get('horas_out')" class="mt-2" />
                    </div>-->
                </div>
                <div class="w-full flex flex-col space-y-1.5">
                    <x-input-label for="comentario" :value="__('Comentário')"/>
                    <textarea 
                        class="border-zinc-400 bg-transparent text-white focus:border-[#D0BCFF] focus:ring-[#D0BCFF] rounded-sm shadow-sm" 
                        name="comentario" 
                        id="comentario" 
                        rows="6"
                    ></textarea>
                </div>
                <div class="flex flex-col-reverse sm:flex-row items-center justify-center sm:justify-start gap-2 sm:gap-4">
                    <x-button type="button" class="w-full sm:w-auto" variant="outlined" onclick="window.location.href='{{ route('documento.solicitacoes') }}'">
                        Voltar
                    </x-button>
                    <x-button type="submit" class="w-full sm:w-auto">
                        Validar
                    </x-button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>