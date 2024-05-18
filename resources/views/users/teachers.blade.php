<x-app-layout>
    <div>
        <h1 class="text-center mt-3 text-destacar text-xxl">PROFESORES</h1>
    </div>

    <div class="grid-container">
        @foreach ($teachers as $t)
            <x-contenedor-usuarios :ruta="'home'">
                <x-slot name="imagen">{{$t->image}}</x-slot>
                <x-slot name="nombre">{{$t->name}}</x-slot>
                <x-slot name="usuario">{{$t->id}}</x-slot>
                <x-slot name="biography">{{$t->biography}}</x-slot>
            </x-contenedor-usuarios>
        @endforeach
    </div>

</x-app-layout>