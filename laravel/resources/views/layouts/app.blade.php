<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-zinc-900">
    <nav class="bg-zinc-800">
        <div class="container mx-auto px-8 py-6 text-gray-50 flex items-center justify-between">
            <a href="#" class="font-bold text-2xl tracking-tight leading-none whitespace-nowrap flex items-center">
                SIGAC
            </a>
            <div>
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Login
                </a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-8 py-8">
        @yield('content')
    </div>
</body>
</html>