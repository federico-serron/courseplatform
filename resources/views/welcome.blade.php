<x-app-layout>
    {{-- BANNER --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/home/child-865116_1920.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Aprende donde sea, lo que sea</h1>
                <p class="text-white font-semibold text-2xl mt-2 mb-4">En FreeLearning encontraras todo tipo de cursos, con contenidos adaptados a diferentes niveles de conocimiento y area. Siempre a tu alcance</p>

                    {{-- SEARCH COMPONENT --}}
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class=" w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Buscar curso">
                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                        width="512px" height="512px">
                        <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 font-bold text-center text-3xl mb-6">CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class = "rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/train-4734117_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Curso y mas</h1>
                </header>
                <p class="text-sm text-gray-700">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda, fugiat nam. Recusandae quis, repudiandae dolor</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/hummingbird-hawkmoths-4811285_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Curso y mas</h1>
                </header>
                <p class="text-sm text-gray-700">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda, fugiat nam. Recusandae quis, repudiandae dolor</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/pet-care-4778387_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Curso y mas</h1>
                </header>
                <p class="text-sm text-gray-700">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda, fugiat nam. Recusandae quis, repudiandae dolor</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/railroad-163518_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Curso y mas</h1>
                </header>
                <p class="text-sm text-gray-700 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda, fugiat nam. Recusandae quis, repudiandae dolor</p>
            </article >
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">No sabes que curso comenzar?</h1>
        <p class="text-center text-white">Dirigete al catalogo de cursos y filtralos por categoria o nivel</p>

        <div class="flex justify-center mt-4">
        <!-- BUTTON component -->
            <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 border-b-4 border-blue-800 hover:border-blue-400 rounded">
                Cursos
            </a>
        </div>
    </section>

    <section class="mt-24">
        <h1 class=" text-center text-gray-700 font-bold text-3xl">ULTIMOS CURSOS</h1>

        <div class="mt-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>