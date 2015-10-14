<?php
namespace ies\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use ies\Alumno;
use ies\Aula;
use ies\Carrera;


class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::paginate(15);
        $alumnos->setPath(route('alu_index_url'));
        return view('alumnos.alu_index',['alumnos'=>$alumnos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aulas = Aula::all();
        $carreras = Carrera::all();
        
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
    public function store(Request $request)
    {
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

        $alumno = new Alumno();
        $alumno->alu_nombre     = $request->get('alu_nombre');
        $alumno->alu_apellido   = $request->get('alu_apellido');
        $alumno->alu_aul_id     = $request->get('alu_aul_id');
        $alumno->alu_car_id     = $request->get('alu_car_id');
        $alumno->save();

        return redirect()->route('alu_index_url');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        $aulas = Aula::all();
        $carreras = Carrera::all();
        
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
    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->alu_nombre     = $request->get('alu_nombre');
        $alumno->alu_apellido   = $request->get('alu_apellido');
        $alumno->alu_aul_id     = $request->get('alu_aul_id');
        $alumno->alu_car_id     = $request->get('alu_car_id');
        $alumno->save();

        return redirect()->route('alu_index_url');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return redirect()->route('alu_index_url');
    }
}