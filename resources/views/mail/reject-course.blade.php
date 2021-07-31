<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso Rechazado</title>
</head>
<body>
    <h1>Este es un correo electronico de prueba</h1>

    <p>El curso <b>{{ $course->title }}</b> se ha rechazado.</p>
    <h2>Motivo del rechazo: </h2>
    {!! $course->observation->body !!}
</body>
</html>