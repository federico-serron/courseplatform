<x-app-layout>

    {{-- Header --}}
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 md:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class=""></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                <p class="mb-2"><i class="far fa-star "></i> Calificacion: {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:order-1 lg:col-span-2">

            {{-- Goals --}}
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>                            
                        @endforeach
                    </ul>
                </div>
            </section>

            {{-- Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @foreach ($course->sections as $section)

                    <article class="mb-4 shadow"
                    @if ($loop->first)
                        x-data="{open:true}"
                    @else
                        x-data="{open:false}"
                    @endif>

                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open=!open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle text-gray-500 mr-2"></i>{{ $lesson->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>

            {{-- Requirements --}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>

            {{-- Description --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl">Descripción</h1>

                <div class="text-gray-700 text-base">{!! $course->description !!}</div>
            </section>

            {{-- @livewire('CoursesReviews', ['course' => $course]) --}}

        </div>

        <div class="order-1 lg:order-2">

            {{-- Teacher card & Enroll button --}}
            <section class="card mb-4">
                <div class="card-body">
                    
                    <div class="flex items-center">
                        <img class="rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>

                    @can('enrolled', $course)
                    
                    <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Continuar con el curso</a>

                    @else
                        @if ($course->price->value == 0)
                            <p class="text-2xl font-bold text-green-500 mb-2">GRATIS</p>

                            <form method="POST" action="{{ route('courses.enrolled', $course) }}">
                                @csrf
                                @method('post')
                                <button class="btn btn-danger btn-block mt-4" type="submit">Tomar este curso</button>
                            </form>

                        @else
                            <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">U$S: {{ $course->price->value }}</p>
                            <a href="{{ route('payment.checkout', $course) }}" class="btn btn-success btn-block">Comprar este curso</a>

                        @endif

                    @endcan

                </div>
            </section>

            {{-- Similar courses --}}
            <aside class="hidden lg:block">
                @foreach ($similars as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}" alt="">
                        <div class="ml-3">
                            <h1><a class="font-bold text-gray-500 mb-3" href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a></h1>

                            <div class="flex items-center mb-2">
                                <img class="h8 w-8 object-cover rounded-full shadow" src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="font-bold text-sm text-blue-500 ml-2">{{'@' . $similar->teacher->name }}</p>
                            </div>

                                <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-500"></i>{{ $similar->rating }}</p>

                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

    </div>
</x-app-layout>