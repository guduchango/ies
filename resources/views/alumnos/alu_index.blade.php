@extends ('layouts/default')

@section ('title') Listado de Alumnos @stop

@section ('content')
<div class="pull-left">
    <a class="btn btn-success" href="{{ route('alu_create_url') }}" >Crear Alumno</a>
</div>
    <br><br>

    <table class="table table-striped">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Carrera</th>
            <th>Aula</th>
            <th>Acciones</th>
        </tr>
        @foreach ($alumnos as $var)
            <tr>
                <td>{{ $var->alu_id }}</td>
                <td>{{ strtoupper($var->alu_nombre) }}</td>
                <td>{{ strtoupper($var->alu_apellido) }}</td>
                <td>{{ strtoupper($var->carrera->car_nombre) }}</td>
                <td>{{ strtoupper($var->aula->aul_nombre) }}</td>
                <td>
                    <form action="{{route('alu_destroy_url', $var->alu_id)}}" method="post" title="Eliminar doctor" >
                        {{ csrf_field() }}
                        <button  class="glyphicon glyphicon-trash btn btn-danger pull-right"></button>
                        <input type="hidden" name="_method" value="delete">
                    </form>
                    <a class='btn  btn-info glyphicon glyphicon-edit' title='editar alumno'  href="{{ route('alu_edit_url', $var->alu_id) }}"></a>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <div class="pagination"> {!! $alumnos->render() !!}</div>
    <br><br>
@stop