<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoCuota;
use App\Cuota;
use App\Inscripcion;
use DB;
use Carbon\Carbon;

class PagoCuotaController extends Controller
{
    public function index()
    {
      $ano = Carbon::now()->format('Y');
      $inscripciones = DB::table('inscripcion')
            ->join('ciclo', 'inscripcion.id_ciclo', '=', 'ciclo.id_ciclo')
            ->join('alumno', 'inscripcion.id_alumno', '=', 'alumno.id')
            ->join('plan', 'inscripcion.id_plan', '=', 'plan.id')
            ->join('grado', 'inscripcion.id_grado', '=', 'grado.id_grado')
            ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
            ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
            ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
            ->select('inscripcion.id_inscripcion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre', 
                    'alumno.primer_apellido', 'alumno.segundo_apellido', 'grado.nombre as grado_nombre', 
                    'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre', 'ciclo.anio as ciclo_ano', 
                    'plan.nombre as plan_nombre' ,'inscripcion.cuota')
            ->where('ciclo.anio', $ano)
            ->get();

      return view ('pagomensualidad.index',compact('inscripciones'));
    }

    public function pagos(Request $request, $id)
    {
      $inscripcion = Inscripcion::findOrFail($id);
      $pagos = PagoCuota::where('id_inscripcion', $id)->get();
      $cuotas = Cuota::where('condicion', 1)->get();

      return view ('pagomensualidad.pagos',compact('inscripcion', 'pagos', 'cuotas'));
    }
}
