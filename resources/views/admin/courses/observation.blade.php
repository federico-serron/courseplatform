@extends('adminlte::page')

@section('title', 'FS Academy')

@section('content_header')
    <h1>Observaciones del curso <strong>{{ $course->title }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}    

                <div class="form-group">
                    {!! Form::label('body', 'Observaciones del curso') !!}
                    {!! Form::textarea('body', null) !!}

                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop