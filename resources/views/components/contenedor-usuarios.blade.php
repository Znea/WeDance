<div class="contenedor">
    <div class="flex">
        <div class="w-1/4 ">
            <img src="{{asset('storage/img_perfil/'.$imagen)}}" class="mx-auto rounded-full w-32 h-32">
        </div>
        <div class="w-full">
            <div class="flex justify-between">
                <a href="{{route('users.destroy' , ['user' => $usuario])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 custom-svg">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </a>
                <a href="{{route('users.edit' , ['user' => $usuario])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit custom-svg">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </a>
            </div>
            <div>
                <h3 class="text-md text-secondary text-center">{{$nombre}}</h3>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <form action="{{ route($ruta) }}" method="get">
            <button type="submit" class="button bg-secondary text-white">Ver más</button>
        </form>
    </div>
</div>