<x-app-layout>
    <div>
        <h1 class="text-center mt-3 text-destacar text-xxl">PROFESORES</h1>
    </div>

    @foreach ($teachers as $t)
        <x-contenedor-usuarios :ruta="'home'">
            <x-slot name="imagen">{{$t->image}}</x-slot>
            <x-slot name="nombre">{{$t->name}}</x-slot>
            <x-slot name="usuario">{{$t->id}}</x-slot>
        </x-contenedor-usuarios>
    @endforeach

</x-app-layout>