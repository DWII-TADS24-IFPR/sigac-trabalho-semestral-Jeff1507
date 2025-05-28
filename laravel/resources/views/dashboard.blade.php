<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <x-title>
            Olá, {{ Auth::user()->name }}! 👋
        </x-title>
        <div class="w-full flex gap-8">
            @can('isStudent', App\Models\Role::class)
                <div class="flex-1 bg-zinc-800 p-4">
                    Grafico
                </div>
                <div class="w-56 space-y-8">
                    <div class="w-full h-48 bg-zinc-800 p-4 flex flex-col">
                        <h3 class="text-lg font-semibold text-zinc-200">
                            Horas Complementares
                        </h3>
                        <a href="{{ route('declaracao.aluno', Auth::user()->aluno->id) }}" target="_blank">
                            <x-button>
                                Gera declaracao
                            </x-button>
                        </a>
                    </div>
                    <div class="w-full h-48 bg-zinc-800 p-4 flex flex-col">
                        <h3 class="text-lg font-semibold text-zinc-200">
                            Solicitar Horas
                        </h3>
                        <x-button>
                            Solicitar Horas
                        </x-button>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
