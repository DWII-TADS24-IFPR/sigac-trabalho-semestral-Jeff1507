<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-8">
        @csrf
        <h1 class="text-2xl font-medium text-center text-white tracking-wider">
            Acesse sua Conta
        </h1>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between w-full">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm bg-transparent border-white text-[#D0BCFF] shadow-sm focus:ring-[#D0BCFF] dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Lembre-se de mim') }}</span>
            </label>
            @if (Route::has('password.request'))
                <x-link href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </x-link>
            @endif
        </div>

            <x-button type="submit" class="w-full">
                {{ __('Entrar') }}
            </x-button>
        
    </form>
</x-guest-layout>
