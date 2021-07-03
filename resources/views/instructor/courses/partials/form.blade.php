<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso:') !!}
    {!! Form::text('title', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('title') ? 'border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subitulo del curso:') !!}
    {!! Form::text('subtitle', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('subtitle') ? 'border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug:', 'Slug del curso:') !!}
    {!! Form::text('slug', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('slug') ? 'border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripcion del curso:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? 'border-red-600' : '')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">

    <div>
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}

        @error('category_id')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>


    <div>
        {!! Form::label('level_id', 'Nivel:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}

        @error('level_id')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>


    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}

        @error('price_id')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/7181184/pexels-photo-7181184.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        @endisset
    </figure>

    <div>
        <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, ea perferendis provident sed id, laboriosam blanditiis assumenda, error nulla libero vitae officiis fuga vero distinctio. Numquam recusandae dicta molestias magni.</p>
        {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file', 'accept' => 'image/*' ]) !!}

        @error('file')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>

</div>