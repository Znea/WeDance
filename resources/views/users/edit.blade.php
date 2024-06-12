<x-app-layout>

    <div class="titulo" >
        <h1 class="text-center mt-3 text-destacar text-xxl">Actualizar {{$rol}}</h1>
    </div>

    <div class="contenedor w-3/4 mx-auto">

        <img src="{{ asset('storage/img_perfil/' . $user->image) }}" class="image-overlay rounded-lg">

        <form action="{{route('users.update', ['user' => $user->id])}}" method="POST" class="w-5/6 mx-auto show" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between">
                <!-- Name -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="name" :value="__('Nombre')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="name" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- LastName -->
                <div class="relative z-0 w-full mb-5 group ms-2" x-data="{ focused: false }">
                    <x-input-label for="lastname" :value="__('Apellidos')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="lastname" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="lastname" :value="$user->lastname" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>
            </div>

            <!-- Address -->
            <div class="relative z-0 w-full mb-5 group" x-data="{ focused: false }">
                <x-input-label for="address" :value="__('Dirección')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                <x-text-input id="address" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="address" :value="$user->address" required autofocus autocomplete="username" x-ref="input" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <!-- Phone -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="phone" :value="__('Teléfono')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="phone" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="phone" :value="$user->phone" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- DNI -->
                <div class="relative z-0 w-full mb-5 group ms-2" x-data="{ focused: false }">
                    <x-input-label for="dni" :value="__('DNI')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="dni" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="dni" :value="$user->dni" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="flex items-center justify-between">
                <div class="relative z-0 w-1/2 mb-5 group me-2">
                    <x-input-label for="date_of_birth" :value="__('Fecha de Nacimiento')"/>
                    <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="$user->date_of_birth" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                </div>
                <div class="ms-5 w-1/2">
                    <input type="file" class="block w-full input-image" name="image"/>
                </div>
            </div>

           @if ($rol == 'Profesor')
                <!-- Biografía -->
                <label>Biografía</label>
                <div class=" z-0 w-full mb-5 group">
                    <textarea name="biography" id="biography" class="w-full focus:ring-0 mt-4" >{{$user->biography}}</textarea>
                    <x-input-error :messages="$errors->get('biography')" class="mt-2" />
                </div>
           @endif

            <!-- Rol -->
            <input type="hidden" value="{{strtolower($rol)}}" name="rol">
            <x-primary-button class="button w-1/2">
                {{ __('ACTUALIZAR') }}
            </x-primary-button>
        </form>
        <form class="w-5/6 mx-auto" action="{{$rol == 'Alumno' ? route('students') : route('teachers')}}">
            <button class="button font-semibold bg-secondary w-1/2">
                {{ __('CANCELAR') }}
            </button>
        </form>
    </div>


</x-app-layout>


