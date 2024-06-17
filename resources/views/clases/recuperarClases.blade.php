<x-app-layout>

    @if (session('msg'))
        <x-alerta>{{session('msg')}}</x-alerta>
    @endif

    <div class="w-full">
        <h1 class="text-center leading-tight p-5 mt-5 text-destacar text-lg md:text-xxl ">{{$vista == 'apuntado' ? 'AQUÍ PUEDES VER TUS CLASES' : 'AQUÍ PUEDES VER TUS ANTIGUAS CLASES'}}</h1>
    </div>

    <div class="contenedor">
        <h2 class="text-center text-md md:text-xl text-secondary">{{$vista == 'apuntado' ? '¡ERES UN/A ARTISTA!' : '¿QUIERES VOLVER?'}}</h2>
        @if (count($clases) > 0)
            @foreach ($clases as $c)
                <div class="border-b-2 border-secondary">
                    <div class="md:flex justify-between pb-5 md:p-10 mt-4">
                        <div class="md:w-3/4">
                            <h3 class="text-sm mb-5 text-center md:text-lg md:mb-0 md:text-start">{{$c->name}}</h3>
                        </div>
                        <form class="md:w-1/4" action="{{ $vista == 'apuntado' ? route('studentClases.destroy', ['clase' => $c->id , 'vista' => 'desapuntado' ]) : route('studentClases.update', ['clase' => $c->id]) }}" method="POST">
                            @csrf
                            @if ($vista == 'apuntado')
                                @method('DELETE')
                            @else
                                @method('PUT')
                            @endif

                            <button class="login bg-secondary font-semibold">{{ $vista == 'apuntado' ? 'DESAPUNTAR' : 'VOLVER' }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
        <div class="p-10 mt-4">
            <p class="text-center text-secondary text-md md:text-lg">{{$vista == 'apuntado' ? 'NO TE HAS APUNTADO A NINGUNA CLASE' : 'NO TE HAS DADO DE BAJA DE NINGUNA CLASE'}}</p>
        </div>
        @endif

        <form action="{{route('studentClases.index', ['vista' => $vista == 'apuntado' ? 'desapuntado' : 'apuntado'])}}" class="mt-5">
            <button class="login bg-destacar font-semibold">{{$vista == 'apuntado' ? 'CLASES ANTIGUAS' : 'CLASES ACTUALES'}}</button>
        </form>
    </div>


</x-app-layout>
