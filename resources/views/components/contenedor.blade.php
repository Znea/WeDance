<div class="contenedor" data-aos="zoom-in">
    <h2 class="text-center text-xl text-secondary">
        {{$title}}
    </h2>
    <div class="mt-2 mb-3">
        <p class="text-center">{{$slot}}</p>
    </div>
    <div>
        <form action="{{ route($ruta) }}" method="get">
            <button type="submit" class="button bg-destacar text-white">VER MÁS</button>
        </form>
    </div>
</div>
