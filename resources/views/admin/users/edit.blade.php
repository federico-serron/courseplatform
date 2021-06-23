@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
    {{-- MENSAJE DE SESION --}}
    @if (session('info'))
        
    <div class="alert alert-primary" role="alert">
        <strong>Hecho! </strong>{{ session('info') }}
    </div>

    @endif
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre</h1>
            <p class="form-control">{{ $user->name }}</p>

            <h1 class="h5">Permisos</h1>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                @foreach ($roles as $role)
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label><br>
                @endforeach
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop