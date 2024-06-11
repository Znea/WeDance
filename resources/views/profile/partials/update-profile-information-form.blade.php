<section>

    <header class="text-center">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Actualiza tu información") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mt-9">
            <div class="flex items-center justify-between">
                <!-- Name -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="name" :value="__('Nombre')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="name" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- LastName -->
                <div class="relative z-0 w-full mb-5 group ms-2" x-data="{ focused: false }">
                    <x-input-label for="lastname" :value="__('Apellidos')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="lastname" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname', $user->lastname)" autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>
            </div>

            <!-- Address -->
            <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
                <x-input-label for="address" :value="__('Dirección')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                <x-text-input id="address" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="address" :value="old('address', $user->address)" autofocus autocomplete="username" x-ref="input" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <!-- Phone -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="phone" :value="__('Teléfono')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="phone" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->phone)" autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- DNI -->
                <div class="relative z-0 w-full mb-5 group ms-2" x-data="{ focused: false }">
                    <x-input-label for="dni" :value="__('DNI')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="dni" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="dni" :value="old('dni', $user->dni)" autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="date_of_birth" :value="__('Fecha de Nacimiento')"/>
                <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth', $user->date_of_birth)" autofocus autocomplete="username" x-ref="input" />
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
                <x-input-label for="email" :value="__('Correo')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                <x-text-input id="email" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" autofocus autocomplete="username" x-ref="input" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            @if ($user->rol == 'profesor')
                <div>
                    <x-input-label :value="__('Biografía')" />
                    <textarea class="biography" placeholder="Escribe una biografía sobre ti" name="biography"  autofocus autocomplete="biography">{{old('biography', $user->biography)}}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('biography')" />
                </div>
            @endif

            <div class="text-start">
                <input id="image" name="image" type="file" class="mt-1" :value="old('image', $user->image)" autofocus autocomplete="image" />
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>
        </div>

        <div class="flex items-center gap-4 mt-7">
            <x-primary-button class="login">{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Guardar.') }}</p>
            @endif
        </div>
    </form>
</section>
