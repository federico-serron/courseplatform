<x-app-layout>
    {{-- BANNER --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/home/child-865116_1920.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Aprende donde sea, lo que sea</h1>
                <p class="text-white font-semibold text-2xl mt-2 mb-4">En FreeLearning encontraras todo tipo de cursos, con contenidos adaptados a diferentes niveles de conocimiento y area. Siempre a tu alcance</p>

                    {{-- SEARCH COMPONENT --}}
                @livewire('search')
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