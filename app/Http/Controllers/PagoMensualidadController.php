<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoMensualidad;
use App\Inscripcion;
use DB;
use Carbon\Carbon;


class PagoMensualidadController extends Controller
{
    public function index()
    {
      $ano = Carbon::now()->format('Y');
      $inscripciones = DB::table('inscripcion')
                        ->join('alumno', 'inscripcion.id_alumno', '=', 'alumno.id')
                        ->join('plan', 'inscripcion.id_plan', '=', 'plan.id')
                        ->join('grado', 'inscripcion.id_grado', '=', 'grado.id_grado')
                        ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
                        ->join('detalle', 'carrera.id', '=', 'detalle.id_carrera')
                        ->join('ciclo', 'detalle.id_ciclo', '=', 'ciclo.id_ciclo')
                        ->select('inscripcion.id_inscripcion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.primer_apellido', 'alumno.segundo_apellido',
                                'grado.nombre as grado_nombre', 'ciclo.año as ciclo_ano', 'plan.nombre as plan_nombre' ,'inscripcion.cuota')
                        ->where('ciclo.año', $ano)
                        ->get();

      return view ('pagomensualidad.index',compact('inscripciones'));
    }

    public function pagos(Request $request, $id)
    {
      $inscripcion = Inscripcion::findOrFail($id);
      $pagos = PagoMensualidad::where('id_inscripcion', $id)->get();
      $date = Carbon::now()->format('d-m-Y');
      //$date = '7-4-2018';
      $mes = Carbon::now()->format('m');
      $ano = Carbon::now()->format('Y');

      return view ('pagomensualidad.pagos',compact('inscripcion', 'pagos', 'date', 'mes', 'ano'));
    }

    public function create($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('pagomensualidad.create',compact('inscripcion'));
    }

    public function store(MensualidadFormRequest $request)
    {
        $pagomensualidad = (new PagoMensualidad)->fill($request->all());
        $pagomensualidad->save();
        return redirect()->route('pagomensualidad.index');
    }

    public function show($id)
    {
      $pagomensualidad = PagoMensualidad::findOrFail($id);
      return view('pagomensualidad.show', compact('pagomensualidad'));
    }

    public function edit($id)
    {
      $pagomensualidad = PagoMensualidad::findOrFail($id);
      return view('pagomensualidad.edit',compact('pagomensualidad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'monto' => 'required|numeric',
          'mora' => 'nullable|numeric'
        ]);

        $pago = PagoMensualidad::findOrFail($id);

        $date = Carbon::now();
        $pago->monto = $request->monto;
        $pago->fecha = $date;
        $pago->mora = $request->mora;
        $pago->save();

        return redirect()->back();
        //return redirect()->route('pagomensualidad.index');
    }

    public function destroy(Request $request, $id)
    {
      if($request->has('valor')){
        $pagomensualidad = PagoMensualidad::findOrFail($id);
        $pagomensualidad->update();
      }
      return redirect()->route('pagomensualidad.index');
    }
}
