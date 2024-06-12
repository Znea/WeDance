<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
            <x-input-label for="email" :value="__('Correo')" class="label text-darken bg-transparent" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
            <x-text-input id="email" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" x-ref="input" />
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
                          required autocomplete="new-password"
                          x-ref="input" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 relative z-0 w-full mb-5 group" x-data="{ focused: false }">
            <x-input-label for="password" :value="__('Confirmar Contraseña')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            x-on:focus="focused = true"
                            x-on:blur="focused = false"
                            x-bind:class="{ 'input-focused': focused || $refs.input.value }"
                            required autocomplete="new-password"
                            x-ref="input"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="login">
                {{ __('Cambiar Contraseña') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
