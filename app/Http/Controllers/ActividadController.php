<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActividadFormRequest;
use App\Actividad;
use App\TipoActividad;
use App\AsignacionCurso;
use App\Unidad;
use App\Nota;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
   }

    public function grados()
    {
        $id_persona = auth()->user()->persona->id_persona;
        $anio = Carbon::now()->format('Y');
        $grados = DB::table('asignacion_curso as a')
                  ->join('grado as g','g.id_grado','a.id_grado')
                  ->join('seccion as s','s.id','g.id_seccion')
                  ->join('carrera as c','c.id','g.id_carrera')
                  ->join('jornada as j', 'j.id_jornada','c.id_jornada')
                  ->select('g.id_grado','g.nombre as grado','s.nombre as seccion','j.nombre as jornada', 'c.nombre as carrera')
                  ->where('a.id_persona',$id_persona)
                  ->where('a.anio', $anio)
                  ->groupBy('g.id_grado','g.nombre','s.nombre','j.nombre', 'c.nombre')
                  ->get();


        return view ('notas.grados',compact('grados'));
    }
    public function cursos($id)
    {
      $id_persona = auth()->user()->persona->id_persona;
      $id_grado=$id;

      $cursos=DB::table('asignacion_curso as a')
              ->join('curso as c','a.id_curso','c.id_curso')
              ->select('c.id_curso','c.nombre')
              ->where('a.id_persona',$id_persona)
              ->where('a.id_grado',$id)
              ->get();
      return view ('notas.cursos',compact('cursos','id_grado'));
    }
    public function actividades($id_grado,$id_curso)
    {
      $id_persona = auth()->user()->persona->id_persona;
      $grado=$id_grado;
      $curso=$id_curso;
      $asignacion=DB::table('asignacion_curso as a')
                      ->select('a.*')
                      ->where('a.id_persona',$id_persona)
                      ->where('a.id_grado',$id_grado)
                      ->where('a.id_curso',$id_curso)
                      ->first();

      $id_asignacion=DB::table('asignacion_curso')
                      ->select('id_asignacion_curso')
                      ->where('id_persona',$id_persona)
                      ->where('id_grado',$id_grado)
                      ->where('id_curso',$id_curso)
                      ->first();

      $actividades=Actividad::where('id_asignacion_curso',$id_asignacion->id_asignacion_curso)
                      ->get();

      return view('notas.actividades',compact('actividades','grado','curso','id_asignacion'));
    }
    public function alumnos($grado,$actividad)
    {
      $anio = Carbon::now()->format('Y');
      $alumnos=DB::table('inscripcion as insc')
                      ->join('alumno as a','insc.id_alumno','a.id')
                      ->join('ciclo as c','c.id_ciclo','insc.id_ciclo')
                      ->select('a.*')
                      ->where('insc.id_grado',$grado)
                      ->where('c.anio',$anio)
                      ->get();
      $nota=DB::table('inscripcion as insc')
                      ->join('alumno as a','insc.id_alumno','a.id')
                      ->join('ciclo as c','c.id_ciclo','insc.id_ciclo')
                      ->join('nota as n','n.id_alumno','a.id')
                      ->join('actividad as act','act.id_actividad','n.id_actividad')
                      ->select('n.id_nota as id_nota','n.nota as nota','a.id as id','n.id_actividad as id_actividad')
                      ->where('insc.id_grado',$grado)
                      ->where('c.anio',$anio)
                      ->where('n.id_actividad',$actividad)
                      ->get();

      return view('notas.alumnos',compact('alumnos','grado','nota','actividad'));
    }

    public function create($id_grado,$id_curso,$asignacion)
    {
        $id_asignacion=$asignacion;
        $grado=$id_grado;
        $curso=$id_curso;
        $tipos=TipoActividad::where('condicion',1)->get();
        $unidades = Unidad::where('condicion',1)->get();
        return view('notas.create', compact('id_asignacion','tipos','unidades','grado','curso'));
    }

    public function store(ActividadFormRequest $request,$id_grado,$id_curso)
    {
        $anio = Carbon::now()->format('Y');
        $actividad = (new Actividad)->fill($request->all());
        $actividad->anio = $anio;
        $actividad->save();
        $grado=$id_grado;
        $curso=$id_curso;
        return redirect()->route('notas.actividades',[$grado,$curso]);
    }


    public function edit($id_grado,$id_curso,$asignacion,$id)
    {
      $actividad=Actividad::findOrFail($id);
      $tipos=TipoActividad::where('condicion',1)->get();
      $unidades = Unidad::where('condicion',1)->get();
      $grado=$id_grado;
      $curso=$id_curso;
      $id_asignacion=$asignacion;
      return view('notas.edit', compact('actividad','tipos','unidades','grado','curso','id_asignacion'));
    }

    public function update(ActividadFormRequest $request, $id, $id_grado,$id_curso)
    {
      $anio = Carbon::now()->format('Y');
      $act = Actividad::findOrFail($id);
      $actividad = ($act)->fill($request->all());
      $actividad->anio=$anio;
      $actividad->update();
      $grado=$id_grado;
      $curso=$id_curso;
      return redirect()->route('notas.actividades',[$grado,$curso]);
    }

    public function destroy(Request $request, $id)
    {

      Actividad::findOrFail($id)->delete();
      return back();

    }
}
