<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\TipoActividad;
use App\AsignacionCurso;
use App\Unidad;
use App\Nota;
use App\Grado;
use App\Curso;
use App\Record;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Redirect;
use Illuminate\Support\Facades\Auth;
use PDF;

class PortalPadreController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin,padre');
   }
       public function hijos()
       {
         $id_persona = auth()->user()->persona->id_persona;
         $anio = Carbon::now()->format('Y');

         $hijos=DB::table('inscripcion as insc')
                    ->join('alumno as al','al.id','insc.id_alumno')
                    ->join('grado as g','g.id_grado','insc.id_grado')
                    ->select('al.id','al.primer_nombre','al.segundo_nombre','al.primer_apellido','al.segundo_apellido','g.nombre','g.id_grado')
                    ->where('al.id_persona',$id_persona)
                    ->get();

          return view('portalpadres.index',compact('hijos'));
        }
        public function unidades($idAlumno,$id)
        {
          return view('portalpadres.unidades',compact('idAlumno','id'));
        }


        public function pnotas($idAlumno,$id,$idUnidad)
        {
          $id_persona = auth()->user()->persona->id_persona;
          $ano = Carbon::now()->format('Y');
          $alumno=DB::table('alumno')
                      ->select('*')
                      ->where('id',$idAlumno)
                      ->where('id_persona',$id_persona)
                      ->first();
                      //dd($alumno);
          $unidades=Unidad::whereBetween('id_unidad',[1,$idUnidad])->get();

          $materia=DB::table('asignacion_curso as asig')
                  ->join('curso as c','c.id_curso','asig.id_curso')
                  ->select('c.nombre','c.id_curso')
                  ->where('id_grado',$id)
                  ->where('anio',$ano)
                  ->get();
           $cursos=DB::table('asignacion_curso')
                     ->where('id_grado',$id)
                     ->where('anio',$ano);

           $curso=$cursos->pluck('id_curso');

           //notas finales

           $notas=DB::table('tipo_actividad as ta')
                      ->join('actividad as act','ta.id_tipo_actividad','act.id_tipo_actividad')
                      ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
                      ->join('nota as n', 'n.id_actividad','act.id_actividad')
                      ->join('alumno as a','a.id','n.id_alumno')
                      ->select('a.id as id_alumno','asig.id_curso','act.id_unidad',DB::raw('sum(n.nota) as notaf'))
                      ->whereBetween('act.id_unidad',[1,$idUnidad])
                      ->where('act.anio',$ano)
                      ->where('asig.id_grado',$id)
                      ->where('a.id',$idAlumno)
                      ->whereIn('asig.id_curso',$curso)
                      ->groupBy('a.id','asig.id_curso','act.id_unidad')
                      ->get();

          $sumafinal=DB::table('tipo_actividad as ta')
                     ->join('actividad as act','ta.id_tipo_actividad','act.id_tipo_actividad')
                     ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
                     ->join('nota as n', 'n.id_actividad','act.id_actividad')
                     ->join('alumno as a','a.id','n.id_alumno')
                     ->select('a.id as id_alumno','asig.id_curso',DB::raw('sum(n.nota) as notaf'))

                     ->where('act.anio',$ano)
                     ->where('asig.id_grado',$id)
                     ->whereIn('asig.id_curso',$curso)
                     ->groupBy('a.id','asig.id_curso')
                     ->get();
//dd($sumafinal);
          $records=Record::where('id_alumno',$idAlumno)->get();
          return view('portalpadres.notas',compact('alumno','unidades','notas','cursos','materia','records','sumafinal'));

        }




}
