<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Grado;
use App\Curso;
use App\AsignacionCurso;

use DB;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin');
   }
    public function index()
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
                  ->orderBy('c.nombre', 'desc')
                  ->get();

        return view ('asistencia.grados',compact('grados'));
    }

    public function cursos($idGrado)
    {
      $id_persona = auth()->user()->persona->id_persona;
      $grado = Grado::findOrFail($idGrado);

      $cursos=DB::table('asignacion_curso as a')
              ->join('curso as c','a.id_curso','c.id_curso')
              ->select('c.id_curso','c.nombre')
              ->where('a.id_persona',$id_persona)
              ->where('a.id_grado',$idGrado)
              ->orderBy('c.nombre', 'asc')
              ->get();
      return view ('asistencia.cursos',compact('cursos','grado'));
    }

    public function asistencias($idCurso, $idGrado)
    {
        $anio = Carbon::now()->format('Y');
        $idPersona = auth()->user()->persona->id_persona;

        $curso = Curso::findOrFail($idCurso);
        $grado = Grado::findOrFail($idGrado);

        $asignacion_curso = AsignacionCurso::where('id_grado', $idGrado)
                            ->where('id_curso', $idCurso)
                            ->where('id_persona', $idPersona)
                            ->where('anio', $anio)
                            ->first();

        $asistencias = DB::table('asistencia')
                  ->select('asistencia.fecha')
                  ->where('asistencia.id_asignacion_curso', $asignacion_curso->id_asignacion_curso)
                  ->groupBy('asistencia.fecha')
                  ->orderBy('asistencia.fecha', 'desc')
                  ->get();

        return view('asistencia.asistencias',compact('asistencias','asignacion_curso', 'curso', 'grado'));
    }

    public function alumnos($idCurso, $idGrado)
    {
      $anio = Carbon::now()->format('Y');
      $idPersona = auth()->user()->persona->id_persona;

      $curso = Curso::findOrFail($idCurso);
      $grado = Grado::findOrFail($idGrado);

      $asignacion_curso = AsignacionCurso::where('id_grado', $idGrado)
                            ->where('id_curso', $idCurso)
                            ->where('id_persona', $idPersona)
                            ->where('anio', $anio)
                            ->first();

      $alumnos=DB::table('inscripcion as insc')
                      ->join('alumno as a','insc.id_alumno','a.id')
                      ->join('ciclo as c','c.id_ciclo','insc.id_ciclo')
                      ->select('a.primer_nombre', 'a.segundo_nombre', 'a.tercer_nombre', 'a.primer_apellido',
                                'a.segundo_apellido', 'a.id as id_alumno')
                      ->where('insc.id_grado',$idGrado)
                      ->where('c.anio',$anio)
                      ->orderBy('a.primer_apellido', 'asc')
                      ->get();

      return view('asistencia.alumnos',compact('alumnos','asignacion_curso', 'curso', 'grado'));
    }

    public function ver($idCurso, $idGrado, $fecha)
    {
        $anio = Carbon::now()->format('Y');
        $idPersona = auth()->user()->persona->id_persona;

        $curso = Curso::findOrFail($idCurso);
        $grado = Grado::findOrFail($idGrado);

        $asignacion_curso = AsignacionCurso::where('id_grado', $idGrado)
                            ->where('id_curso', $idCurso)
                            ->where('id_persona', $idPersona)
                            ->where('anio', $anio)
                            ->first();

        $asistencias = DB::table('asistencia')
                            ->join('alumno', 'asistencia.id_alumno', 'alumno.id')
                            ->select('alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre', 'alumno.primer_apellido', 'alumno.segundo_apellido',
                                    'asistencia.condicion', 'asistencia.observacion')
                            ->where('asistencia.id_asignacion_curso', $asignacion_curso->id_asignacion_curso)
                            ->where('asistencia.fecha', $fecha)
                            ->get();

        return view('asistencia.ver',compact('asistencias','fecha', 'curso', 'grado'));
    }

    public function store(Request $request)
    {
        $date = Carbon::now();
        $anio = Carbon::now()->format('Y');
        $idPersona = auth()->user()->persona->id_persona;

        $curso = Curso::findOrFail($request->curso);
        $grado = Grado::findOrFail($request->grado);

        $asignacion = AsignacionCurso::findOrFail($request->asignacion);
        $id_asignacion_curso = $asignacion->id_asignacion_curso;

        $comprobar_asignacion = AsignacionCurso::where('id_grado', $grado->id_grado)
                                    ->where('id_curso', $curso->id_curso)
                                    ->where('id_persona', $idPersona)
                                    ->where('anio', $anio)
                                    ->first();

        if($comprobar_asignacion->id_asignacion_curso != $id_asignacion_curso){
            return response()->json(["success" => false]);
        }

        foreach($request->asistencias as $asis)
        {
            $asistencia = new Asistencia();
            $asistencia->fecha = $date;
            $asistencia->condicion = $asis['asistencia'];
            $asistencia->observacion = $asis['observacion'];
            $asistencia->id_asignacion_curso = $id_asignacion_curso;
            $asistencia->id_alumno = $asis['alumno'];
            $asistencia->save();
        }

        return response()->json([ "success" => true, "curso" => $curso->id_curso, "grado" => $grado->id_grado ]);
    }

}
