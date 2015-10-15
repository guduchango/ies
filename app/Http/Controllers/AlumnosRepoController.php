<?php

namespace ies\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \ies\Http\Controllers\Controller;
use \ies\Repositories\AluRepositoryInterface;

class AlumnosRepoController extends Controller {

    public function __construct(AluRepositoryInterface $alumno) {
        $this->alumno = $alumno;
    }

    public function index() {
        $alumnos = $this->alumno->aluSelectAll();
        return view('alumnos.alu_index',['alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $aulas = $this->alumno->aulSelectAll();
        $carreras = $this->alumno->carSelectAll();
        
        $data=[
            'carreras' => $carreras,
            'aulas' => $aulas
        ];
        
        return view('alumnos.alu_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'alu_nombre' => 'required',
            'alu_apellido' =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('alu_create_url')
                ->withErrors($validator)
                ->withInput();
        }
        
        $this->alumno->aluSave($request);

        return redirect()->route('alu_index_url');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $alumno = $this->alumno->aluFind($id);
        $aulas = $this->alumno->aulSelectAll();
        $carreras = $this->alumno->carSelectAll();
        
        $data=[
            'carreras' => $carreras,
            'aulas' => $aulas,
            'alumno' => $alumno
        ];
        return view('alumnos.alu_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $this->alumno->aluUpdate($request,$id);
        
        return redirect()->route('alu_index_url');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $this->alumno->aluDestroy($id);
        
        return redirect()->route('alu_index_url');
    }

}
