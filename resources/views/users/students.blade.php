<x-app-layout>

    @if (session('id'))
        <div id="popup-modal" tabindex="-1" class="fixed inset-0 z-40 flex items-center justify-center overflow-y-auto">
            <div class="fixed inset-0 bg-black opacity-50"></div> <!-- Background overlay -->
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro de que deseas eliminar este alumno?</h3>
                        <div class="flex inline-flex">
                            <form action="{{ route('users.destroy', ['user' => session('id') , 'rol' => 'alumno' ]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Si seguro
                                </button>
                            </form>
                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (session('msg'))
       <x-alerta>{{session('msg')}}</x-alerta>
    @endif

    <div class="flex justify-between">
        <div class="w-full">
            <h1 class="text-center mt-3 text-destacar text-xxl">ALUMNOS</h1>
        </div>
        @auth
            @if (Auth::user()->rol == 'admin')
                <form action="{{route('users.create', ['rol' => 'Alumno'])}}" class="my-auto" data-aos="zoom-in">
                    <button class="text-xxl my-auto plus-button ">+</button>
                </form>
            @endif
        @endauth
    </div>

    <div class="grid-container">
        @foreach ($students as $t)
            <x-contenedor-usuarios :ruta="'home'">
                <x-slot name="imagen">{{$t->image}}</x-slot>
                <x-slot name="nombre">{{$t->name}} {{$t->lastname}}</x-slot>
                <x-slot name="usuario">{{$t->id}}</x-slot>
                <x-slot name="rol">Alumno</x-slot>
                <x-slot name="category">{{$t->category->name}}</x-slot>
            </x-contenedor-usuarios>
        @endforeach
    </div>

</x-app-layout>
