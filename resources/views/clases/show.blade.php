<x-app-layout>

    @if (session('msg'))
        <x-alerta>{{session('msg')}}</x-alerta>
    @endif

    <div id="modal-profesor" tabindex="-1" class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50"></div> <!-- Background overlay -->
        <div class="relative p-4 w-full max-w-md max-h-md">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="cerrarModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-profesor">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">ELIJA UN PROFESOR</h3>
                    <div>
                        <form action="{{route('clases.asignarProfesor', ['clase' => $clase->id])}}" method="POST" class="w-5/12 mx-auto text-start">
                            @csrf
                            @method('PUT')

                            @foreach ($profesores as $p )
                                <p><input type="radio" value="{{$p->id}}" name="teacher" class="ms-2 me-2"> {{$p->name}} {{$p->lastname}} </p>
                            @endforeach

                            <div class="text-center">
                                <button data-modal-hide="modal-profesor" type="submit" class="mt-4 text-white bg-destacar hover:bg-darken focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Asignar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="titulo" >
        <h1 class="text-center mt-3 text-destacar text-xxl">{{$clase->name}}</h1>
    </div>

    <div class="contenedor w-5/6 mx-auto">

        <div class="image-overlay-clase-container rounded-lg">
            <img src="{{ asset('storage/img_clases/' . $clase->image) }}" class="image-overlay-clase ">
        </div>

        <div class="show">
            <div class="text-center">
                <p>{{$clase->description}}</p>
            </div>

            <div class="flex space-between mt-10">
                <div class="w-full mx-auto text-center">
                    <h2 class="text-lg">HORARIO</h2>
                    <p class="mt-5 text-xs">{{$clase->schedule}}</p>
                </div>
                <div class="w-full mx-auto text-center">
                    <h2 class="text-lg mb-5">PROFESOR</h2>
                    <a class="text-xs hover:font-semibold" href="{{$clase->teacher ? route('users.show', ['user' => $clase->teacher->id]) : ''}}">{{$clase->teacher ? $clase->teacher->name.' '.$clase->teacher->lastname : 'NO HAY ASIGNADO NINGÚN PROFESOR'}}</a>
                    @if ($clase->teacher == null)
                        <div class="w-1/2 mx-auto mt-5">
                            <button class="bg-destacar login" id="asignarProfesor">ASIGNAR PROFESOR</button>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        @auth
            @if (Auth::user()->rol == 'alumno')
                @php
                    $apuntado = false;
                    if(count(Auth::user()->students_clases) != 0){
                        foreach (Auth::user()->students_clases as $clases) {
                            if ($clases->id == $clase->id && $clases->pivot->deleted_at == null) {
                                $apuntado = true;
                            }
                        }
                    }
                @endphp
                <form action="{{$apuntado ? route('studentClases.destroy', ['clase' => $clase->id, 'vista' => 'clases']) : route('studentClases.store' , ['clase' => $clase->id])}}" method="POST">
                    @csrf
                    @if($apuntado)
                        @method('DELETE')
                    @endif
                    <button class="login bg-destacar">{{$apuntado ? 'DARSE DE BAJA' : 'APUNTARSE'}}</button>
                </form>

            @else
                @if (Auth::user()->rol == 'admin' || Auth::user()->id == $clase->user_id)
                    <form action="{{route('clases.alumnos', ['clase' => $clase->id])}}">
                        @csrf
                        <button class="login bg-destacar">VER ALUMNOS</button>
                    </form>
                @endif
            @endif
        @endauth
    </div>


</x-app-layout>


