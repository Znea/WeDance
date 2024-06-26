<div class="contenedor" data-aos="zoom-in">
    <div class="flex">
        <div class="w-1/4 ">
            <img src="{{asset('storage/img_perfil/'.$imagen)}}" class="mx-auto rounded-full imagen-profesor" alt="perfil">
        </div>
        <div class="w-full">
            @auth
                @if (Auth::user()->rol == 'admin')
                    <div class="flex justify-between">
                        <h3 class="text-md text-secondary w-full text-center">{{$nombre}}</h3>

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
                                <x-dropdown-link :href="route('users.edit', ['user' => $usuario, 'rol' => $rol])">
                                   <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit custom-svg">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        <p class="ms-4">Editar</p>
                                   </div>
                                </x-dropdown-link>

                                <!-- Destroy -->
                                <x-dropdown-link :href="route('users.modal', ['user' => $usuario, 'rol' => $rol])">
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
                        <h3 class="text-md text-secondary text-center">{{$nombre}}</h3>
                    </div>
                @endif
            @else
                <div>
                    <h3 class="text-md text-secondary text-center">{{$nombre}}</h3>
                </div>
            @endauth
            @if ($rol == 'Profesor')
                <div class="text-center mt-4">
                    <p>{{$biography}}</p>
                </div>
            @else
                <div class="text-center mt-4">
                    <p class="text-sm text-destacar">{{$category}}</p>
                </div>
            @endif
        </div>

    </div>

    <div class="mt-4">
        <form action="{{ route('users.show', ['user' => $usuario]) }}" method="get">
            <button type="submit" class="login w-full text-xs bg-secondary text-white">{{$rol == 'Profesor' ? 'SABER MÁS' : 'VER CLASES'}}</button>
        </form>
    </div>
</div>
