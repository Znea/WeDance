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
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro de que deseas eliminar esta clase de este profesor?</h3>
                        <div class="flex inline-flex">
                            <form action="{{route('clases.quitarProfesor', ['clase' => session('id')])}}" method="POST">
                                @csrf
                                @method('PUT')

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

    <div class="titulo">
        <h1 class="text-center mt-3 text-destacar text-xxl">{{$user->name}} {{$user->lastname}}</h1>
    </div>

    <div class="contenedor ">
        <img src="{{ asset('storage/img_perfil/' . $user->image) }}" class="image-overlay rounded-lg">

        <div class="descripcion-show text-xs text-destacar">
            <p class="mb-5">{{$user->biography}}</p>
            @if (count($user->teacher_clases) > 0)
                <h2 class="mt-12 text-secondary text-lg">CLASES</h2>
                <div class="w-5/6 mx-auto  ">
                    @foreach ($user->teacher_clases as $c)
                        @auth
                            @if (Auth::user()->rol == "admin")
                                <div class="mt-3 flex justify-between border-b-2 border-primary">
                                    <p>{{$c->name}}</p>
                                    <!-- Destroy -->
                                    <form action="{{route('clases.modal', ['clase' => $c->id, 'sitio' => 'profesor'])}}">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-destacar">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="mt-3 flex justify-between border-b-2 border-primary">
                                    <p>{{$c->name}}</p>
                                </div>
                            @endif
                        @else
                            <div class="mt-3 flex justify-between border-b-2 border-primary">
                                <p>{{$c->name}}</p>
                            </div>
                        @endauth
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
