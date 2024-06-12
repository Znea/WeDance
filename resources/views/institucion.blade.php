<x-app-layout>
    <div class="flex justify-between">
        <div class="w-full">
            <h1 class="text-center mt-3 text-destacar text-xxl">INSTITUCIÓN</h1>
        </div>
        @auth
            <form action="{{route('incendios')}}" class="my-auto" data-aos="zoom-in">
                <button class="my-auto plus-button ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 h-8">
                        <path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3
                        0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288
                        274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7
                        64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0
                        1 1 0-48z"/>
                    </svg>
                </button>
            </form>
        @endauth
    </div>

    <div class="contenedor" data-aos="zoom-in">
        <div class="text-sm leading-tight ms-5">
            <h2 class="text-xl text-destacar font-semibold text-center mb-5">Escuela de Danza Urbana: We Dance</h2>
            <p class="text-center">
                We Dance es una institución líder en la enseñanza de baile urbano, comprometida con el desarrollo artístico
                y personal de sus estudiantes. Fundada en 2010, la academia se ha destacado por su enfoque innovador y su dedicación
                a la excelencia en la danza.
            </p>
        </div>
    </div>

    <div class="grid-container">
        <div class="contenedor" data-aos="fade-left">
            <h3 class="text-destacar font-semibold text-center text-lg mt-3 mb-3">Visión y Misión</h3>
            <p class="text-justify">
                La misión de We Dance es inspirar y empoderar a todas las personas a través del arte del baile urbano. Su visión es ser
                una referencia global en la formación de bailarines que no solo dominen la técnica, sino que también desarrollen un profundo
                amor por la danza y la cultura urbana.
            </p>
        </div>
        <div class="contenedor"  data-aos="fade-right">
            <h3 class="text-destacar font-semibold text-center text-lg mt-3 mb-3">Programas de Formación</h3>
            <p class="text-justify">
                La academia ofrece una amplia variedad de programas diseñados para todas las edades y niveles de habilidad. Desde clases
                introductorias para principiantes hasta programas avanzados para bailarines profesionales, We Dance asegura que cada estudiante
                reciba la atención y la instrucción necesarias para alcanzar su máximo potencial. Los estilos enseñados incluyen hip-hop,
                breaking, popping, entre otros.
            </p>
        </div>
    </div>

    <div class="grid-container">
        <div class="contenedor" data-aos="fade-left">
            <h3 class="text-destacar font-semibold text-center text-lg mt-3 mb-3">Equipo de Instructores</h3>
            <p class="text-justify">
                El equipo de instructores de We Dance está compuesto por bailarines profesionales con experiencia internacional.
                Cada instructor aporta su propio estilo y conocimiento, creando un ambiente de aprendizaje diverso y enriquecedor.
                La academia se enorgullece de su capacidad para atraer a algunos de los mejores talentos del mundo de la danza urbana.
            </p>
        </div>
        <div class="contenedor" data-aos="fade-right">
            <h3 class="text-destacar font-semibold text-center text-lg mt-3 mb-3">Instalaciones y Recursos</h3>
            <p class="text-justify">
                Ubicada en un moderno edificio en el corazón de la ciudad, la academia cuenta con amplios estudios de danza equipados con
                espejos, barras de soporte y sistemas de sonido de alta calidad. Las instalaciones están diseñadas para proporcionar un
                ambiente seguro y cómodo donde los estudiantes puedan practicar y perfeccionar sus habilidades.
            </p>
        </div>
    </div>

    <div class="grid-container">
        <div class="contenedor" data-aos="fade-left">
            <h3 class="text-destacar font-semibold text-center text-lg mt-3 mb-3">Eventos y Competencias</h3>
            <p class="text-justify">
                We Dance organiza y participa regularmente en eventos y competencias locales, nacionales e internacionales. Estos eventos
                no solo brindan a los estudiantes la oportunidad de mostrar su talento, sino que también fomentan la camaradería y el
                espíritu de equipo. La academia ha ganado numerosos premios y reconocimientos, destacándose como una de las mejores escuelas
                de baile urbano del país.
            </p>
        </div>
        <div class="contenedor" data-aos="fade-right">
            <h3 class="text-destacar font-semibold text-center text-lg mt-3 mb-3">Conclusión</h3>
            <p class="text-justify">
                We Dance se ha consolidado como una institución de referencia en la enseñanza de la danza urbana. Con su dedicación a la
                excelencia, un equipo de instructores altamente calificados, y un compromiso genuino con el desarrollo de sus estudiantes,
                la academia continúa transformando vidas a través del poder del baile. Si estás buscando un lugar para aprender, crecer y
                expresarte a través de la danza urbana, We Dance es, sin duda, la elección perfecta.
            </p>
        </div>
    </div>

</x-app-layout>
