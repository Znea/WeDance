<x-app-layout>

    @if (session('id'))
        <div id="popup-modal" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto">
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
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro de que deseas eliminar esta clase?</h3>
                        <div class="flex inline-flex">
                            <form action="{{route('clases.destroy', ['clase' => session('id')])}}" method="POST">
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
            <h1 class="text-center mt-3 text-destacar text-xxl">CLASES</h1>
        </div>
        @auth
            @if (Auth::user()->rol == 'admin')
                <form action="{{route('clases.create')}}" class="my-auto" data-aos="zoom-in">
                    <button class="text-xxl my-auto plus-button ">+</button>
                </form>
            @endif
        @endauth
    </div>

    @foreach ($clases as $c )
        <div class="contenedor" data-aos="zoom-in">
            @auth
                @if (Auth::user()->rol == 'admin')
                    <div class="flex justify-between">
                        <h3 class="text-md text-secondary w-full text-center">{{$c->name}}</h3>

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-lg">
                                    <div class="ms-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-vertical custom-svg">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('clases.edit', ['clase' => $c->id])">
                                   <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit custom-svg">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        <p class="ms-4">Editar</p>
                                   </div>
                                </x-dropdown-link>

                                <!-- Destroy -->
                                <x-dropdown-link :href="route('clases.modal', ['clase' => $c->id, 'sitio' => 'clases'])">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 custom-svg">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        <p class="ml-4">Eliminar</p>
                                    </div>
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div>
                        <h3 class="text-md text-secondary text-center">{{$c->name}}</h3>
                    </div>
                @endif
            @else
                <div>
                    <h3 class="text-md text-secondary text-center">{{$c->name}}</h3>
                </div>
            @endauth
            <div class="image-container">
                <img src="{{asset('storage/img_clases/'.$c->image)}}" class="imagen-clase">
            </div>
            <div class="mt-3">
                <p class="text-center">{{$c->description}}</p>
            </div>
            <form class="mt-3" action="{{route('clases.show', ['clase' => $c->id])}}">
                <button class="w-full button bg-secondary">SABER MÁS</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
