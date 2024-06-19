<x-app-layout>


    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="{{asset('images/categorias/baby.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/3 top-1/2 left-1/2" alt="baby">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('images/categorias/infantil.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/3 top-2/3 left-1/2" alt="infantil">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('images/categorias/juvenil.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="juvenil">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('images/categorias/amateur.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="amateur">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('images/categorias/senior.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/3 top-1/2 left-1/2" alt="enior">
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div data-aos="flip-right">
        <h1 class="text-center mt-3 text-destacar text-xxl">WE DANCE</h1>
    </div>

    <x-contenedor :ruta="'institucion'">
        <x-slot name="title">
            INSTITUCIÓN
        </x-slot>
        <x-slot name="slot">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante metus dictum at. Eu augue ut lectus arcu bibendum at varius. Justo nec ultrices dui sapien eget. Vitae congue mauris rhoncus aenean.
        </x-slot>
    </x-contenedor>

    <x-contenedor :ruta="'teachers'" >
        <x-slot name="title">
            PROFESORES
        </x-slot>
        <x-slot name="slot">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante metus dictum at. Eu augue ut lectus arcu bibendum at varius. Justo nec ultrices dui sapien eget. Vitae congue mauris rhoncus aenean.
        </x-slot>
    </x-contenedor>

    <x-contenedor :ruta="'clases.index'">
        <x-slot name="title">
            CLASES
        </x-slot>
        <x-slot name="slot">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante metus dictum at. Eu augue ut lectus arcu bibendum at varius. Justo nec ultrices dui sapien eget. Vitae congue mauris rhoncus aenean.
        </x-slot>
    </x-contenedor>
</x-app-layout>
