<x-app-layout>

    <div class="flex justify-between">
        <div class="w-full">
            <h1 class="text-center mt-3 text-destacar text-xxl">ALUMNOS</h1>
        </div>
    </div>

    @foreach ($alumnos as $a)
        <div class="contenedor">
           <div class="flex items-center">
                <img src="{{asset('storage/img_perfil/'.$a->image)}}" alt="imagen de perfil de usuarios" class="w-1/12 rounded-full">
                <a class="font-primary text-xl w-full text-center text-secondary hover:text-destacar" href="{{route('users.show', ['user' => $a->id])}}">{{$a->name}} {{$a->lastname}}</a>
           </div>
        </div>
    @endforeach

</x-app-layout>
