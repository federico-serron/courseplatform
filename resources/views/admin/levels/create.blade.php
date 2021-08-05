@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Crear nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.levels.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre del nivel') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>        
                {!! Form::submit('Crear nivel', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
