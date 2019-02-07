<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Curso;
use App\Record;
use App\AsignacionCurso;
use App\Inscripcion;
use App\Asistencia;

use DB;
use Carbon\Carbon;
use Session;
use PDF;

class RecordController extends Controller
{
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

        return view ('record.grados',compact('grados'));
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
      return view ('record.cursos',compact('cursos','grado'));
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

      return view('record.alumnos',compact('alumnos','asignacion_curso', 'curso', 'grado', 'idPersona'));
    }

    public function store(Request $request)
    {
        $reporte = new Record();

        $date = Carbon::now();
        $anio = Carbon::now()->format('Y');

        $reporte->observacion = $request->observacion;
        $reporte->id_alumno = $request->id_alumno;
        $reporte->id_grado = $request->id_grado;
        $reporte->id_curso = $request->id_curso;
        $reporte->id_persona = $request->id_persona;
        $reporte->fecha = $date;
        $reporte->anio = $anio;
        $reporte->save();
        Session::flash('flash_message', 'Reporte creado exitosamente!');
        //$request->session()->flash('alert-success', 'Reporte creado exitosamente!');
        return redirect()->route('record.alumnos', [$request->id_curso, $request->id_grado]);
    }

    public function alumno($idInscripcion)
    {
      $inscripcion = Inscripcion::findOrFail($idInscripcion);
      $alumno = $inscripcion->alumno;
      $anio = Carbon::now()->format('Y');

      $reportes = Record::where('id_alumno', $alumno->id)
                        ->where('anio', $anio)
                        ->orderBy('fecha', 'desc')
                        ->get();
      
      $inasistencias = Asistencia::where('id_alumno', $alumno->id)
                                ->whereYear('fecha', $anio)
                                ->where('condicion', 0)
                                ->orderBy('fecha', 'desc')
                                ->get();

      return view ('record.alumno', compact('reportes', 'inasistencias', 'inscripcion'));
    }

    public function reportespdf($idInscripcion)
    {
      $inscripcion = Inscripcion::findOrFail($idInscripcion);
      $alumno = $inscripcion->alumno;
      $anio = Carbon::now()->format('Y');

      $reportes = Record::where('id_alumno', $alumno->id)
                        ->where('anio', $anio)
                        ->orderBy('fecha', 'desc')
                        ->get();
      
      $data = ['reportes' => $reportes, 'inscripcion' => $inscripcion ];
      $pdf = PDF::loadView('record.reportespdf', $data);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Reportes_' . $alumno->primer_nombre . '_' . $alumno->primer_apellido . '.pdf');
    }

    public function inasistenciaspdf($idInscripcion)
    {
      $inscripcion = Inscripcion::findOrFail($idInscripcion);
      $alumno = $inscripcion->alumno;
      $anio = Carbon::now()->format('Y');

      $inasistencias = Asistencia::where('id_alumno', $alumno->id)
                                ->whereYear('fecha', $anio)
                                ->where('condicion', 0)
                                ->orderBy('fecha', 'desc')
                                ->get();
      
      $data = ['inasistencias' => $inasistencias, 'inscripcion' => $inscripcion ];
      $pdf = PDF::loadView('record.inasistenciaspdf', $data);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Inasistencias_' . $alumno->primer_nombre . '_' . $alumno->primer_apellido . '.pdf');
    }
    
}
