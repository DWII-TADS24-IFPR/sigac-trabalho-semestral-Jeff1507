<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-8">
        @csrf
        <h1 class="text-2xl font-medium text-center text-white tracking-wider">
            Criar Conta
        </h1>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome Completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- Curso -->
        <div>
            <x-input-label for="curso_id" :value="__('Curso')" />
            <x-select :options="$cursos" name="curso_id" label="Selecione um curso" class="block mt-1 w-full"/>
            <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />
        </div>
        <!-- Turma -->
        <div>
            <x-input-label for="turma_id" :value="__('Turma')" />
            <select name="turma_id" id="turma_id" class= "block mt-1 w-full border-zinc-400 bg-transparent text-white focus:border-[#D0BCFF] focus:ring-[#D0BCFF] rounded-sm shadow-sm">
                <option value="" class="bg-zinc-900 rounded-none">
                    Selecione uma turma
                </option>
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}" class="bg-zinc-900">
                        {{ $turma->ano }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('turma_id')" class="mt-2" />
        </div>
        <x-button type="submit" class="w-full">
            {{ __('Registrar') }}
        </x-button>
        
        <x-link href="{{ route('login') }}">
            {{ __('Ir para o Login') }}
        </x-link>
    </form>
</x-guest-layout>
