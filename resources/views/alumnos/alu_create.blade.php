@extends ('layouts/default')

@section ('title') Crear Alumno @stop

@section ('content')
    <div class="col-md-12">
        <form method="post" action="{{route('alu_store_url')}}" class="form-horizontal"> 
        {{ csrf_field() }}
        <fieldset>
            <!--Apellido Alumno-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Apellido: *</label>
                <div class="col-sm-10 ">
                    <input type="text" class="form-control" placeholder="" value="{{old("alu_apellido")}}" name="alu_apellido" id="alu_apellido">
                    @if($errors->has('alu_apellido'))
                        <p class="text-danger">{{ $errors->first('alu_apellido') }}</p>
                    @endif
                </div>
            </div>
            
             <!--Nombre Alumno-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Nombre: *</label>
                <div class="col-sm-10 ">
                    <input type="text" class="form-control" placeholder="" value="{{old("alu_nombre")}}" name="alu_nombre" id="alu_nombre">
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
                            <option value="{{$sel->aul_id}}" >{{$sel->aul_nombre}}</option>
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
                            <option value="{{$sel->car_id}}" >{{$sel->car_nombre}}</option>
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