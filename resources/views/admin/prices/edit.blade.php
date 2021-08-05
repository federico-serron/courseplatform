@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Editar precio</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
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
                {!! Form::submit('Actualizar precio', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop