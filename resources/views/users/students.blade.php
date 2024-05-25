<x-app-layout>
    @if (session('msg'))
       <x-alerta>{{session('msg')}}</x-alerta>
    @endif

    <div>
        <h1 class="text-center mt-3 text-destacar text-xxl">ALUMNOS</h1>
    </div>

    <div class="grid-container">
        @foreach ($students as $t)
            <x-contenedor-usuarios :ruta="'home'">
                <x-slot name="imagen">{{$t->image}}</x-slot>
                <x-slot name="nombre">{{$t->name}} {{$t->lastname}}</x-slot>
                <x-slot name="usuario">{{$t->id}}</x-slot>
                <x-slot name="rol">alumno</x-slot>
                <x-slot name="category">{{$t->category->name}}</x-slot>
            </x-contenedor-usuarios>
        @endforeach
    </div>

</x-app-layout>
