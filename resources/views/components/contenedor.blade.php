<div class="contenedor">
    <h2 class="text-center text-xl text-secondary">
        {{$title}}
    </h2>
    <div class="mt-2 mb-3">
        <p class="text-center">{{$slot}}</p>
    </div>
    <div>
        <form action="{{ route($ruta) }}" method="get">
            <button type="submit" class="bg-destacar text-white">Ver más</button>
        </form>
    </div>
</div>