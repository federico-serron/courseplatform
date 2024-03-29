<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 col-span-8">

        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!! $current->iframe !!}
            </div>
            <h1 class="font-bold text-2xl text-black mt-2">{{ $current->name }}</h1>

            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->name }}
                </div>
            @endif

            <div class="flex justify-between mt-4">
            {{-- Marcar unidad como culmidada --}}
                <div class=" flex items-center cursor-pointer" wire:click="completed()">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-blue-500 text-2xl"></i>
                    @else
                        <i class="fas fa-toggle-off text-gray-500 text-2xl"></i>
                    @endif
                    <p class="ml-2 text-sm">Marcar esta unidad como culminada</p>
                </div>

                @if ($current->resource)
                    <div wire:click="download" class="flex items-center text-gray-500 text-2xl cursor-pointer">
                        <i class="fas fa-download text-lg "></i>
                        <p class="text-sm ml-2">Descargar recurso</p>
                    </div>
                @endif
            </div>

            <div class="card mt-2 mb-4">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>    
                    @endif
                    
                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next }})" class="cursor-pointer ml-auto">Siguiente tema</a>    
                    @endif
                    
                </div>
            </div>
        </div>

        <div class="card ml-4">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>

                {{-- Professor information --}}
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object:cover rounded-full mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>

                    <div class="mx-2">
                        <h1>{{ $course->teacher->name }}</h1>
                        <a class="text-blue-300 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>

                <p class="text-gray-600 text-sm mt-2">{{ $this->advance }}% Completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                      <div style="width:{{ $this->advance }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                    </div>
                  </div>

                {{-- Sections & Their own lessosns --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2" href="">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)

                                                @if ($current->id == $lesson->id)
                                                    <span class="mt-1 inline-block h-4 w-4 border-2 border-yellow-300 rounded-full mr-2"></span>    
                                                @else
                                                    <span class="mt-1 inline-block h-4 w-4 bg-yellow-300 rounded-full mr-2"></span>
                                                @endif

                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="mt-1 inline-block h-4 w-4 border-2 border-gray-500 rounded-full mr-2"></span>
                                                @else
                                                    <span class="mt-1 inline-block h-4 w-4 bg-gray-500 rounded-full mr-2"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}
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
