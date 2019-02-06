<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoCuota;
use App\Cuota;
use App\Inscripcion;
use App\Grado;
use DB;
use Carbon\Carbon;
use PDF;

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
            
      return view ('pagocuota.index',compact('inscripciones'));
    }

    public function pagos(Request $request, $id)
    {
      $inscripcion = Inscripcion::findOrFail($id);
      $pagos = PagoCuota::where('id_inscripcion', $id)->get();
      $cuotas = Cuota::where('condicion', 1)->get();

      return view ('pagocuota.pagos',compact('inscripcion', 'pagos', 'cuotas'));
    }

    public function grados(Request $request, $id)
    {
      $cuota = Cuota::findOrFail($id);

      $ano = Carbon::now()->format('Y');
      $grados = DB::table('grado')
              ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
              ->join('persona', 'grado.id_persona', '=', 'persona.id_persona')
              ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
              ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
              ->join('detalle', 'carrera.id', '=', 'detalle.id_carrera')
              ->join('ciclo', 'detalle.id_ciclo', '=', 'ciclo.id_ciclo')
              ->select('grado.id_grado', 'grado.condicion', 'grado.nombre as grado_nombre', 'seccion.nombre as seccion_nombre', 'jornada.nombre as nombre_jornada',
                      'ciclo.anio as ciclo_ano', 'persona.nombres as persona_nombres', 'persona.apellidos as persona_apellidos')
              ->where('grado.condicion',1)
              ->where('ciclo.anio', $ano)
              ->get();

      return view ('pagocuota.grados',compact('grados', 'cuota'));
    }

    public function alumnos(Request $request, $idCuota, $idGrado)
    {
        $grado = Grado::findOrFail($idGrado);
        $cuota = Cuota::findOrFail($idCuota);

        $pagos = PagoCuota::where('id_cuota', $idCuota)->get();

        $ano = Carbon::now()->format('Y');
        $alumnos = DB::table('inscripcion')
            ->join('ciclo', 'inscripcion.id_ciclo', '=', 'ciclo.id_ciclo')
            ->join('alumno', 'inscripcion.id_alumno', '=', 'alumno.id')
            ->select('inscripcion.id_inscripcion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre', 
                    'alumno.primer_apellido', 'alumno.segundo_apellido', 'ciclo.anio as ciclo_ano')
            ->where('inscripcion.id_grado', $idGrado)
            ->where('ciclo.anio', $ano)
            ->orderBy('alumno.primer_apellido', 'asc')
            ->orderBy('alumno.segundo_apellido', 'asc')
            ->get();

        return view ('pagocuota.alumnos',compact('alumnos', 'pagos', 'cuota', 'grado'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'id_inscripcion' => 'required|integer',
          'id_cuota' => 'required|integer',
          'monto' => 'required|numeric',
        ]);
        
        $inscripcion = Inscripcion::findOrFail($request->id_inscripcion);
        $cuota = Cuota::findOrFail($request->id_cuota);
        
        $date = Carbon::now();
        
        if($cuota->cantidad >= $request->monto && $request->monto >= 0){
          $pago = new PagoCuota();
          $pago->id_inscripcion = $request->id_inscripcion;
          $pago->id_cuota = $request->id_cuota;
          $pago->monto = $request->monto;
          $pago->fecha = $date;
          $pago->anio = $inscripcion->ciclo->anio;
          
          $success = $pago->save();
        }

        //return response()->json(['success' => $success]);
        return redirect()->back();
    }

    public function editar(Request $request, $idCuota, $idInscripcion)
    {
        $request->validate([
          'monto' => 'required|numeric',
        ]);
        
        Inscripcion::findOrFail($idInscripcion);
        Cuota::findOrFail($idCuota);
        
        $buscarPago = PagoCuota::where('id_inscripcion', $idInscripcion)->where('id_cuota', $idCuota)->first();
        
        $date = Carbon::now();
        $pago = PagoCuota::findOrFail($buscarPago->id_pagocuota);
        
        if($pago->cuota->cantidad >= ($pago->monto + $request->monto) && $request->monto >= 0 ){
          $pago->monto = $pago->monto + $request->monto;
          $pago->fecha = $date;
        
          $success = $pago->save();
        }

        //return response()->json(['success' => $success]);
        return redirect()->back();
    }
}
