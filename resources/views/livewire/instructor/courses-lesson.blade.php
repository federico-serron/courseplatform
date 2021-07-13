<div >

    @foreach ($section->lessons as $item)

        <article x-data="{open : false}" class="mt-4">
            <div class="card">
                <div class="card-body">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center mb-4">
                            <label class="w-32 ">Nombre:</label>
                            <input class="bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" wire:model="lesson.name">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex items-center mb-4">
                            <label class="w-32" >Plataforma: </label>
                            <select class="relative bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="lesson.platform_id">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center">
                            <label class="w-32 ">URL:</label>
                            <input class="bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" wire:model="lesson.url">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-2">Actualizar</button>
                        </div>

                    </form>
                @else
                        
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i> Leccion: {{ $item->name }}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">

                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></p>

                        <div class="my-2">
                            <button class="btn btn-primary text-sm" wire:click="edit({{ $item }})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})">Eliminar</button>
                        </div>

                        <div class="mb-4">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key($item->id))
                        </div>

                        <div>
                            @livewire('instructor.lesson-resource', ['lesson' => $item], key($item->id))
                        </div>

                    </div>

                @endif    

                </div>
            </div>
        </article>

    @endforeach

    <div class="mt-4" x-data="{open:false}">

        <a x-show="!open" x-on:click="open = true"  class="flex items-center cursor-pointer mb-4">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva leccion
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold">Agregar nueva leccion</h1>

                <div class="flex items-center mb-4">
                    <label class="w-32 ">Nombre:</label>
                    <input class="bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" wire:model="name">
                </div>
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

                <div class="flex items-center mb-4">
                    <label class="w-32" >Plataforma: </label>
                    <select class="relative bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="platform_id">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>
                    @error('platform_id')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                <div class="flex items-center">
                    <label class="w-32 ">URL:</label>
                    <input class="bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 " wire:model="url">
                </div>
                @error('url')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

                <div class="flex justify-end mt-4">
                    <button x-on:click="open = false" class="btn btn-danger">Cancelar</button>
                    <button class=" btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>

    </div>

</div>
