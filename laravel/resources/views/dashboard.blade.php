<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <x-title>
            Bem Vindo <span class="text-[#D0BCFF]">{{ Auth::user()->name }}</span> 👋
        </x-title>
        
    </div>
</x-app-layout>
