<x-app-layout>
    <div>
        <h1 class="text-center mt-3 text-destacar text-xxl">WE DANCE</h1>
    </div>

    <x-contenedor :ruta="'home'">
        <x-slot name="title">
            INSTITUCIÓN
        </x-slot>
        <x-slot name="slot">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante metus dictum at. Eu augue ut lectus arcu bibendum at varius. Justo nec ultrices dui sapien eget. Vitae congue mauris rhoncus aenean.   
        </x-slot>
    </x-contenedor>

    <x-contenedor :ruta="'home'">
        <x-slot name="title">
            PROFESORES
        </x-slot>
        <x-slot name="slot">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante metus dictum at. Eu augue ut lectus arcu bibendum at varius. Justo nec ultrices dui sapien eget. Vitae congue mauris rhoncus aenean.   
        </x-slot>
    </x-contenedor>

    <x-contenedor :ruta="'home'">
        <x-slot name="title">
            CLASES
        </x-slot>
        <x-slot name="slot">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante metus dictum at. Eu augue ut lectus arcu bibendum at varius. Justo nec ultrices dui sapien eget. Vitae congue mauris rhoncus aenean.   
        </x-slot>
    </x-contenedor>
</x-app-layout>
