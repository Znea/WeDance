<section class="space-y-6">
    <header class="text-center">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Borrar Cuenta') }}
        </h2>

        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 leading-tight">
            {{ __('Una vez la cuenta esté borrada los datos se borrarán permanentemente. Antes de borrar su cuenta asegúrese de descargar sus datos') }}
        </p>
    </header>

    <x-primary-button class="login bg-primary"
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Borrar Cuenta') }}</x-primary-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('¿Estás seguro de que quieres borrar la cuenta?') }}
            </h2>

            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Una vez la cuenta esté borrada los datos se borrarán permanentemente.Introduzca su contraseña para borrar permanentemente su cuenta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Borrar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
