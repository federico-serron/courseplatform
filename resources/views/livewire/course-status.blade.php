<div class="mt-8">
    <div class="container grid grid-cols-3 col-span-8">

        <div class="col-span-2">
            {!! $current->iframe !!}
            <h1 class="font-bold text-2xl text-black mt-2">{{ $current->name }}</h1>
            <p>Previous: {{ $previous->id }}</p>
            <p>Index: {{ $index }}</p>
            <p>Next: {{ $next->id }}</p>
        </div>

        <div class="card">
            <div class="card-body">
                <h1>{{ $course->title }}</h1>

                {{-- Professor information --}}
                <div class="flex items-center">
                    <figure>
                        <img class="rounded-full" src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>

                    <div class="mx-2">
                        <h1>{{ $course->teacher->name }}</h1>
                        <a class="text-blue-300" href="">{{'@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>

                {{-- Sections & Their own lessosns --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold" href="">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">{{ $lesson->id }} @if ($lesson->completed)
                                            (Completado)
                                        @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

    </div>
</div>
