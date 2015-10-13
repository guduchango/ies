@extends('layouts.default')

@section('content')
    <h1>Alumnos</h1>
    <a class="btn btn-primary" href="{{ route('alu_create_url') }}">Crear Alumno</a>
    <hr>
    <ul class="list-unstyled">
    @foreach($alumnos as $var)
        <li>
            <p class="lead">
                <a href="{{ route('alu_show_url', $var->alu_id) }}">
                    {{ $var-> alu_nombre }}
                </a>
            </p>
            <br>
            creado: {{ $var->created_at }}
            <hr>
        </li>
    @endforeach
    </ul>
@stop
