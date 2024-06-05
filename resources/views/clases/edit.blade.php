<x-app-layout>

    <div class="titulo2" >
        <h1 class="text-center mt-3 text-destacar text-xxl">Actualizar Clase</h1>
    </div>

    <div class="contenedor w-3/4 mx-auto">

        <div class="image-overlay-clase-container rounded-lg">
            <img src="{{ asset('storage/img_clases/' . $clase->image) }}" class="image-overlay-clase ">
        </div>

        <form action="{{route('clases.update', ['clase' => $clase->id])}}" method="POST" class="w-5/6 mx-auto show" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between">
                <!-- Name -->
                <div class="relative z-0 w-full mb-5 group me-2" x-data="{ focused: false }">
                    <x-input-label for="name" :value="__('Nombre')" class="label" x-bind:class="{ 'label-focused': focused || $refs.input.value }"/>
                    <x-text-input id="name" x-on:focus="focused = true" x-on:blur="focused = false" x-bind:class="{ 'input-focused': focused || $refs.input.value }" class="block mt-1 w-full" type="text" name="name" :value="$clase->name" required autofocus autocomplete="username" x-ref="input" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            <div class="flex space-between mb-4">
                <div class="me-4 w-1/2">
                    <select id="underline_select" name="teacher" class="block py-2.5 px-0 w-full text-destacar bg-transparent border-0 border-b-2 border-destacar appearance-none focus:outline-none focus:ring-0 focus:border-destacar peer">
                        <option value="null" {{$clase->user_id == null ? 'selected' : ''}}>Profesor</option>
                        @foreach ($profesores as $p)
                            <option value="{{$p->id}}" {{$clase->user_id == $p->id ? 'selected' : ''}} >{{$p->name}} {{$p->lastname}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Imagen-->
                <div class="ms-4">
                    <input type="file" class="block w-full input-image" name="image"/>
                </div>
            </div>

            <!-- Horario -->
            <label>Horario</label>
            <div class=" z-0 w-full mb-5 group">
                <textarea name="schedule" id="schedule" class="w-full focus:ring-0 mt-4" >{{$clase->schedule}}</textarea>
                <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
            </div>

            <!-- Descripción -->
            <label>Descripción</label>
            <div class=" z-0 w-full mb-5 group">
                <textarea name="description" id="description" class="w-full focus:ring-0 mt-4" >{{$clase->description}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <x-primary-button class="button w-1/2">
                {{ __('ACTUALIZAR') }}
            </x-primary-button>
        </form>
        <form class="w-5/6 mx-auto mt-4" action="{{ route('clases.index')}}">
            <button class="button font-semibold bg-secondary w-1/2">
                {{ __('CANCELAR') }}
            </button>
        </form>
    </div>


</x-app-layout>


