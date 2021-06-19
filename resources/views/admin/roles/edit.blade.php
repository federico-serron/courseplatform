@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
{{-- MENSAJE DE SESION --}}
@if (session('info'))
    
    <div class="alert alert-primary" role="alert">
        <strong>Hecho! </strong>{{ session('info') }}
    </div>

@endif

{{-- FORMULARIO --}}
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method'=> 'put']) !!}

                @include('admin.roles.partials.form')
                
                {!! Form::submit('Editar rol', ['class' => 'btn btn-primary mt-2']) !!}
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