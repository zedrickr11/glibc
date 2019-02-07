<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PagoMensualidad;
use App\Mensualidad;
use App\Inscripcion;
use App\Mora;
use App\Grado;
use App\Ciclo;
use App\Cuota;
use App\PagoCuota;

use DB;
use Carbon\Carbon;
use PDF;

class PagoMensualidadController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
   }
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
      $pagos = PagoMensualidad::where('id_inscripcion', $id)->get();
      $mora = Mora::first();
      $date = Carbon::now()->format('d-m-Y');
      //$date = '6-2-2019';
      $mes = Carbon::now()->format('m');
      $ano = Carbon::now()->format('Y');

      return view ('pagomensualidad.pagos',compact('inscripcion', 'pagos', 'mora', 'date', 'mes', 'ano'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'cuota' => 'required|numeric',
          'mora' => 'required|numeric',
          'num_boleta' => 'nullable|string'
        ]);

        $pago = PagoMensualidad::findOrFail($id);
        $mora = Mora::first();
        $date = Carbon::now();

        if($pago->inscripcion->cuota >= $request->cuota && $request->cuota >= 0 && $mora->cantidad >= $request->mora && $request->mora >= 0 ){
          $pago->monto = $request->cuota;
          $pago->fecha = $date;
          $pago->num_boleta = $request->num_boleta;

          if($request->mora != 0){
            $pago->mora = $request->mora;
            $pago->id_mora = $mora->id;
          } elseif($request->mora == 0){
            $pago->mora = 0;
          }

          $pago->save();
        }

        return redirect()->back();
    }

    public function editar(Request $request, $id)
    {
        $request->validate([
          'cuota' => 'required|numeric',
          'mora' => 'required|numeric',
          'num_boleta' => 'nullable|string'
        ]);

        $pago = PagoMensualidad::findOrFail($id);
        $mora = Mora::first();
        $date = Carbon::now();

        if($pago->inscripcion->cuota >= ($pago->monto + $request->cuota) && $request->cuota >= 0 && $mora->cantidad >= ($pago->mora + $request->mora) && $request->mora >= 0 ){
          $pago->monto = $pago->monto + $request->cuota;
          $pago->fecha = $date;
          $pago->num_boleta = $request->num_boleta;

          if(($pago->mora + $request->mora) != 0){
            $pago->mora = $pago->mora + $request->mora;
            $pago->id_mora = $mora->id;
          } elseif(($pago->mora + $request->mora) == 0){
            $pago->mora = 0;
          }
  
          $pago->save();
        }

        return redirect()->back();
    }

    public function reporte(Request $request, $id)
    {
      $inscripcion = Inscripcion::findOrFail($id);
      $pagos = PagoMensualidad::where('id_inscripcion', $id)->get();
      $mora = Mora::first();
      $date = '6-2-2019';
      $mes = Carbon::now()->format('m');
      $ano = Carbon::now()->format('Y');

      /*$view = \View::make('pagomensualidad.reporte', compact('mes'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      $pdf->stream('reporte');*/

      $data = ['inscripcion' => $inscripcion, 'pagos' => $pagos, 'mora' => $mora, 'date' => $date, 'mes' => $mes, 'ano' => $ano];
      $pdf = PDF::loadView('pagomensualidad.reporte', $data);
      return $pdf->stream('itsolutionstuff.pdf');
      
    }

    public function pdf(Request $request, $id)
    {
      $grado = Grado::findOrFail($id);
      $ano = Carbon::now()->format('Y');
      //$inscripcion = Inscripcion::where('id_grado', $id)->ciclo->where('anio', $ano)->get();
      //$inscripcion = Ciclo::where('anio', $ano)->get();

      $mensualidades = Mensualidad::all();

      $inscripciones = DB::table('inscripcion')
                        ->join('ciclo', 'inscripcion.id_ciclo', '=', 'ciclo.id_ciclo')
                        ->join('alumno', 'inscripcion.id_alumno', '=', 'alumno.id')
                        ->join('plan', 'inscripcion.id_plan', '=', 'plan.id')
                        ->join('grado', 'inscripcion.id_grado', '=', 'grado.id_grado')
                        ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
                        ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
                        ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
                        ->where('inscripcion.id_grado', $id)
                        ->where('inscripcion.condicion', 1)
                        ->where('ciclo.anio', $ano);

      $inscripcion_pago = $inscripciones->pluck('inscripcion.id_inscripcion');
        
      $inscripcion_info = $inscripciones->select('inscripcion.id_inscripcion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre', 
                                'alumno.primer_apellido', 'alumno.segundo_apellido', 'grado.nombre as grado_nombre', 
                                'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre', 'ciclo.anio as ciclo_ano', 
                                'plan.nombre as plan_nombre', 'plan.cantidad as plan_cantidad' ,'inscripcion.cuota', 'inscripcion.pago_inscripcion')
                                ->orderBy('alumno.primer_apellido', 'asc')
                                ->orderBy('alumno.segundo_apellido', 'asc')
                                ->get();
        
      $pagos = PagoMensualidad::whereIn('id_inscripcion', $inscripcion_pago)->get();

      //return view ('pagomensualidad.pdf',compact('inscripcion_info', 'pagos', 'mensualidades'));
      
      //  return response()->json($pagos);

      $data = ['inscripcion_info' => $inscripcion_info, 'pagos' => $pagos, 'mensualidades' => $mensualidades, 'grado' => $grado];
      $pdf = PDF::loadView('pagomensualidad.pdf', $data);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Reporte Pagos ' . $grado->nombre . ' Seccion ' . $grado->seccionAsignada->nombre . ' ' . $grado->carrera->jornada->nombre . '.pdf');
      
    }

    public function cuotapdf(Request $request, $id)
    {
      $grado = Grado::findOrFail($id);
      $ano = Carbon::now()->format('Y');

      $cuotas = Cuota::where('condicion', 1)->get();

      $inscripciones = DB::table('inscripcion')
                        ->join('ciclo', 'inscripcion.id_ciclo', '=', 'ciclo.id_ciclo')
                        ->join('alumno', 'inscripcion.id_alumno', '=', 'alumno.id')
                        ->join('plan', 'inscripcion.id_plan', '=', 'plan.id')
                        ->join('grado', 'inscripcion.id_grado', '=', 'grado.id_grado')
                        ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
                        ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
                        ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
                        ->where('inscripcion.id_grado', $id)
                        ->where('inscripcion.condicion', 1)
                        ->where('ciclo.anio', $ano);

      $inscripcion_pago = $inscripciones->pluck('inscripcion.id_inscripcion');
        
      $inscripcion_info = $inscripciones->select('inscripcion.id_inscripcion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre', 
                                'alumno.primer_apellido', 'alumno.segundo_apellido', 'grado.nombre as grado_nombre', 
                                'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre', 'ciclo.anio as ciclo_ano', 
                                'plan.nombre as plan_nombre', 'plan.cantidad as plan_cantidad' ,'inscripcion.cuota', 'inscripcion.pago_inscripcion')
                                ->orderBy('alumno.primer_apellido', 'asc')
                                ->orderBy('alumno.segundo_apellido', 'asc')
                                ->get();
        
      $pagos = PagoCuota::whereIn('id_inscripcion', $inscripcion_pago)->get();

      return view ('pagocuota.reporteporgrado',compact('inscripcion_info', 'pagos', 'cuotas', 'grado'));

      /*$data = ['inscripcion_info' => $inscripcion_info, 'pagos' => $pagos, 'cuotas' => $cuotas, 'grado' => $grado];
      $pdf = PDF::loadView('pagocuota.reporteporgrado', $data);
      $pdf->setPaper('A4', 'landscape');
      return $pdf->stream('Reporte Cuotas ' . $grado->nombre . ' Seccion ' . $grado->seccionAsignada->nombre . ' ' . $grado->carrera->jornada->nombre . '.pdf');
      */
    }
    
}
