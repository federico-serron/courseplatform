<div>
    <article x-data="{open : false}" class="card">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripcion de la leccion</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button class="btn btn-danger text-sm" type="button" wire:click="destroy">Eliminar</button>
                            <button class="btn btn-primary text-sm ml-2" type="submit">Actualizar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea wire:model="name" class="form-input bg-white border w-full border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Agregue una descripcion..."></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button class="btn btn-primary text-sm ml-2" wire:click="store">Agregar descripcion</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
