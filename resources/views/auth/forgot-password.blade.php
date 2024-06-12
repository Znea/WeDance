<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 leading-tight text-center">
        {{ __('¿Has olvidado tu contraseña?. Haznos saber tu correo para enviarte un link para que cambies tu contraseña.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
            <x-input-label for="email" :value="__('Correo')" class="label text-darken bg-transparent" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
            <x-text-input id="email" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" x-ref="input" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="login">
                {{ __('Enviar link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
