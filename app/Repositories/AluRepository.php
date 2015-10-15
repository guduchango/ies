<?php

namespace ies\Repositories;

use ies\Repositories\AluRepositoryInterface;
use Illuminate\Http\Request;
use ies\Alumno;
use ies\Aula;
use ies\Carrera;

class AluRepository implements AluRepositoryInterface {

    public function aluSelectAll() {
        $alumnos = Alumno::paginate(15);
        $alumnos->setPath(route('alu_index_url'));
        return $alumnos;
    }

    public function aluFind($id) {
        return Alumno::find($id);
    }

    public function aluSave(Request $request) {
        
        $alumno = new Alumno();
        $alumno->alu_nombre = $request->get('alu_nombre');
        $alumno->alu_apellido = $request->get('alu_apellido');
        $alumno->alu_aul_id = $request->get('alu_aul_id');
        $alumno->alu_car_id = $request->get('alu_car_id');
        $alumno->save();
        
        return $alumno;
    }
    
    public function aluUpdate(Request $request,$id){
        
        $alumno = Alumno::findOrFail($id);
        $alumno->alu_nombre     = $request->get('alu_nombre');
        $alumno->alu_apellido   = $request->get('alu_apellido');
        $alumno->alu_aul_id     = $request->get('alu_aul_id');
        $alumno->alu_car_id     = $request->get('alu_car_id');
        $alumno->save();
        
        return $alumno;
    }
    
    public function aluDestroy($id){
        
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        
        return $alumno;
    }
    
    public function aulSelectAll(){
        return Aula::all();
    }
    
    public function carSelectAll(){
        return Carrera::all();
    }

}
