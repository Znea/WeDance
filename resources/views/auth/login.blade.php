<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center">
        <p class="font-semibold text-destacar">¿Todavía no tienes una cuenta? <a class="hover:underline" href="{{route('register')}}">Regístrate</a></p>
    </div>

    <form class="max-w-md mx-auto" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
            <x-input-label for="email" :value="__('Correo')" class="label text-darken bg-transparent" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
            <x-text-input id="email" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" x-ref="input" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative z-0 w-full mb-5 group" x-data="{ focused: false }">
            <x-input-label for="password" :value="__('Contraseña')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          x-on:focus="focused = true"
                          x-on:blur="focused = false"
                          x-bind:class="{ 'input-focused': focused || $refs.input.value }"
                          required autocomplete="current-password"
                          x-ref="input" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary" name="remember">
                <span class="ms-2 text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="text-center mt-4 mb-4">
            @if (Route::has('password.request'))
                <a class="underline text-destacar hover:font-semibold " href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste la contraseña?') }}
                </a>
            @endif
        </div>
        <x-primary-button class="button w-1/2">
            {{ __('Inicia sesión') }}
        </x-primary-button>
    </form>
</x-guest-layout>
