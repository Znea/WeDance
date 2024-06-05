<x-app-layout>
    <div >
        <h1 class="text-center mt-3 text-destacar text-xxl">Nuevo {{$rol}}</h1>
    </div>

    <div class="contenedor w-3/4 mx-auto">
        <form action="{{route('users.store')}}" method="POST" class="w-5/6 mx-auto">
            @csrf
            <div class="flex items-center justify-between">
                <!-- Name -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="name" :value="__('Nombre')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="name" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- LastName -->
                <div class="relative z-0 w-full mb-5 group ms-2" x-data="{ focused: false }">
                    <x-input-label for="lastname" :value="__('Apellidos')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="lastname" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>
            </div>

            <!-- Address -->
            <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
                <x-input-label for="address" :value="__('Dirección')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                <x-text-input id="address" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="username" x-ref="input" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <!-- Phone -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="phone" :value="__('Teléfono')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="phone" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- DNI -->
                <div class="relative z-0 w-full mb-5 group ms-2" x-data="{ focused: false }">
                    <x-input-label for="dni" :value="__('DNI')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="dni" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="date_of_birth" :value="__('Fecha de Nacimiento')"/>
                <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required autofocus autocomplete="username" x-ref="input" />
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>

           @if ($rol == 'Profesor')
                <!-- Biografía -->
                <label>Biografía</label>
                <div class=" z-0 w-full mb-5 group">
                    <textarea name="biography" id="biography" class="w-full focus:ring-0 mt-4" >{{old('biography')}}</textarea>
                    <x-input-error :messages="$errors->get('biography')" class="mt-2" />
                </div>
           @endif

            <!-- Email Address -->
            <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
                <x-input-label for="email" :value="__('Correo')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
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

            <!-- Rol -->
            <input type="hidden" value="{{strtolower($rol)}}" name="rol">
            <x-primary-button class="button w-1/2">
                {{ __('CREAR') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
