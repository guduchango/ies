@extends ('layouts/default')

@section ('title') Crear Alumno @stop

@section ('content')
    <div class="col-md-12">
        <form method="post" action="{{route('alu_put_url',$alumno->alu_id)}}" class="form-horizontal"> 
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <fieldset>
            <!--Apellido Alumno-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Apellido: *</label>
                <div class="col-sm-10 ">
                    <input type="text" class="form-control" placeholder="" value="{{$alumno->alu_apellido}}" name="alu_apellido" id="alu_apellido">
                    @if($errors->has('alu_apellido'))
                        <p class="text-danger">{{ $errors->first('alu_apellido') }}</p>
                    @endif
                </div>
            </div>
            
             <!--Nombre Alumno-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Nombre: *</label>
                <div class="col-sm-10 ">
                    <input type="text" class="form-control" placeholder="" value="{{$alumno->alu_nombre}}" name="alu_nombre" id="alu_nombre">
                    @if($errors->has('alu_nombre'))
                        <p class="text-danger">{{ $errors->first('alu_nombre') }}</p>
                    @endif
                </div>
            </div>
             
            <!--Aula Alumno-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Aula: *</label>
                <div class="col-sm-10 ">
                    <select name="alu_aul_id" class="form-control">
                        @foreach($aulas as $sel)
                            @if($sel->aul_id == $alumno->alu_aul_id)
                                <option selected value="{{$sel->aul_id}}" >{{$sel->aul_nombre}}</option>
                            @else
                                <option value="{{$sel->aul_id}}" >{{$sel->aul_nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('alu_aul_id'))
                        <p class="text-danger">{{ $errors->first('alu_aul_id') }}</p>
                    @endif
                </div>
            </div>
            
            <!--Carrera Alumno-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Carrera: *</label>
                <div class="col-sm-10 ">
                    <select name="alu_car_id" class="form-control">
                        @foreach($carreras as $sel)
                            @if($sel->car_id  == $alumno->alu_car_id)
                                <option selected value="{{$sel->car_id}}" >{{$sel->car_nombre}}</option>
                            @else
                                <option value="{{$sel->car_id}}" >{{$sel->car_nombre}}</option>
                            @endif 
                        @endforeach
                    </select>
                    @if($errors->has('alu_car_id'))
                        <p class="text-danger">{{ $errors->first('alu_car_id') }}</p>
                    @endif
                </div>
            </div>

            <!--botones-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a class="btn btn-danger" href="{{ route('alu_index_url')}}">Cancelar</a>
                    </div>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
@stop