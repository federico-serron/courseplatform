@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    {{-- MENSAJE DE SESION --}}
    @if (session('info'))
        
    <div class="alert alert-primary" role="alert">
        <strong>Hecho! </strong>{{ session('info') }}
    </div>

    @endif
    
    @livewire('admin-users')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop