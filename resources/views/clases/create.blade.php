<x-app-layout>

    <div>
        <h1 class="text-center mt-3 text-destacar text-xxl">Crear Clase</h1>
    </div>

    <div class="contenedor w-3/4 mx-auto">

        <form action="{{route('clases.store')}}" method="POST" class="w-5/6 mx-auto">
            @csrf

            <div class="flex items-center justify-between">
                <!-- Name -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="name" :value="__('Nombre')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="name" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            {{-- PROFESOR --}}
            <div class="mb-5">
                <select id="underline_select" name="teacher" class="block py-2.5 px-0 w-full text-destacar bg-transparent border-0 border-b-2 border-destacar appearance-none focus:outline-none focus:ring-0 focus:border-destacar peer">
                    <option value="null" selected>Profesor</option>
                    @foreach ($profesores as $p)
                        <option value="{{$p->id}}">{{$p->name}} {{$p->lastname}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <!-- Horario -->
                <label>Horario</label>
                <div class=" z-0 w-full mb-5 group">
                    <textarea name="schedule" id="schedule" class="w-full focus:ring-0 mt-4" >{{old('schedule')}}</textarea>
                    <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
                </div>
            </div>

            <!-- Descripción -->
            <label>Descripción</label>
            <div class=" z-0 w-full mb-5 group">
                <textarea name="description" id="description" class="w-full focus:ring-0 mt-4" >{{old('description')}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <x-primary-button class="button w-1/2">
                {{ __('CREAR') }}
            </x-primary-button>
        </form>
        <form class="w-5/6 mx-auto mt-4" action="{{route('clases.index')}}">
            <button class="button font-semibold bg-secondary w-1/2">
                {{ __('CANCELAR') }}
            </button>
        </form>
    </div>


</x-app-layout>


