<x-app-layout>

    <div class="flex justify-between">
        <div class="w-full">
            <h1 class="text-center mt-3 text-destacar text-xl p-4 md:text-xxl">ALUMNOS</h1>
        </div>
    </div>

    @foreach ($alumnos as $a)
        <div class="contenedor">
           <div class="flex items-center">
                <img src="{{asset('storage/img_perfil/'.$a->image)}}" alt="imagen de perfil de usuarios" class="w-1/4 md:w-2/12 rounded-full">
                <div class="md:mx-auto ms-4">
                    <a class="font-primary text-lg md:text-xl w-full text-center text-secondary hover:text-destacar" href="{{route('users.show', ['user' => $a->id])}}">{{$a->name}} {{$a->lastname}}</a>
                    <p class="mt-4 text-xs font-semibold md:text-center md:text-sm">{{$a->category->name ?? ''}}</p>
               </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
