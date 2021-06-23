<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/courses/computer-2242264_1920.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Los mejores cursos GRATIS! y a al alcance de Todos.</h1>
                <p class="text-white font-semibold text-2xl mt-2 mb-4">Si estas buscando aprender nuevas habilidades, o mejorar habilidades especificas, este es el lugar.</p>

                    {{-- SEARCH COMPONENT --}}
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('course-index')
    
</x-app-layout>