@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Crear nuevo precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.prices.store']) !!}
                <div class="form-group">

                    {!! Form::label('name', 'Nombre del precio') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre con el que identificara al precio.']) !!}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor.']) !!}
                    @error('value')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                {!! Form::submit('Crear precio', ['class' => 'btn btn-success btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop