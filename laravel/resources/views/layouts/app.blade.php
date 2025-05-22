<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-zinc-900">
    <nav class="bg-zinc-800">
        <div class="container mx-auto px-8 py-4 text-gray-50 flex items-center justify-between ">
            <a href="#" class="font-bold text-2xl tracking-wider leading-none whitespace-nowrap flex items-center">
                SIGAC
            </a>
            <div class="flex gap-4 items-center justify-between">
                <x-button variant="outlined">
                    Acesse sua conta
                </x-button>
                <x-button variant="filled">
                    Crie uma conta
                </x-button>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-8 py-8">
        @yield('content')
    </div>
</body>
</html>