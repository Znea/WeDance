<section>
    <header class="text-center">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Cambiar Contraseña') }}
        </h2>

        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 leading-tight">
            {{ __('Asegúrate de que la contraseña de la cuenta sea larga y segura') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
            <x-input-label for="update_password_current_password" :value="__('Contraseña Actual')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
            <x-text-input id="update_password_current_password" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" x-ref="input"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
            <x-input-label for="update_password_password" :value="__('Nueva Contraseña')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
            <x-text-input id="update_password_password" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" name="password" type="password" class="mt-1 block w-full" autocomplete="password" x-ref="input" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmación contraseña')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
            <x-text-input id="update_password_password_confirmation" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="password_confirmation" x-ref="input" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="login">{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class=" text-gray-600 dark:text-gray-400"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
