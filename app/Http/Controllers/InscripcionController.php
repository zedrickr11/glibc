<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscripcionFormRequest;
use App\Inscripcion;
use App\Alumno;
use App\Grado;
use App\Plan;
use App\Persona;
use App\Ciclo;
use App\PagoMensualidad;
use DB;
use Carbon\Carbon;

class InscripcionController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin,secre,director');
   }
    public function index()
    {
        $anio = Carbon::now()->format('Y');
        $inscripciones = DB::table('inscripcion')
                        ->join('ciclo', 'inscripcion.id_ciclo', '=', 'ciclo.id_ciclo')
                        ->join('alumno', 'inscripcion.id_alumno', '=', 'alumno.id')
                        ->join('plan', 'inscripcion.id_plan', '=', 'plan.id')
                        ->join('grado', 'inscripcion.id_grado', '=', 'grado.id_grado')
                        ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
                        ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
                        ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
                        ->select('inscripcion.id_inscripcion', 'inscripcion.condicion as condicion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre', 'alumno.primer_apellido', 'alumno.segundo_apellido',
                                'grado.nombre as grado_nombre', 'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre', 'ciclo.anio as ciclo_ano', 'plan.nombre as plan_nombre' ,'inscripcion.cuota as cuota')
                        ->where('inscripcion.condicion', 1)
                        ->where('ciclo.anio', $anio)
                        ->orderBy('inscripcion.id_inscripcion', 'desc')
                        ->get();
        return view ('inscripcion.index',compact('inscripciones'));
    }

    public function create()
    {
        $alumnos = Alumno::where('condicion',1)->get();
        $planes = Plan::where('condicion',1)->get();
        $grados = Grado::where('condicion',1)->get();
        $ciclos = Ciclo::where('condicion',1)->get();
        $personas = Persona::where('tipo_persona', 'padre')->get();
        return view('inscripcion.create', compact('alumnos', 'planes', 'ciclos', 'grados', 'personas'));
    }

    public function grados(Request $request, $id)
    {
        $grados = DB::table('grado')
                ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
                ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
                ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
                ->join('detalle', 'carrera.id', '=', 'detalle.id_carrera')
                ->select('grado.id_grado', 'grado.nombre as grado_nombre', 'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre')
                ->where('grado.condicion',1)
                ->where('detalle.id_ciclo', $id)
                ->get();
        return response()->json($grados);
    }

    public function show($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripcion.show', compact('inscripcion'));
    }

    public function edit($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $alumnos = Alumno::where('condicion',1)->get();
        $planes = Plan::where('condicion',1)->get();

        //$grados = Grado::where('condicion',1)->get();
        $grados = DB::table('grado')
                ->join('seccion', 'grado.id_seccion', '=', 'seccion.id')
                ->join('carrera', 'grado.id_carrera', '=', 'carrera.id')
                ->join('jornada', 'carrera.id_jornada', '=', 'jornada.id_jornada')
                ->join('detalle', 'carrera.id', '=', 'detalle.id_carrera')
                ->select('grado.id_grado', 'grado.nombre as grado_nombre', 'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre')
                ->where('grado.condicion',1)
                ->where('detalle.id_ciclo', $inscripcion->ciclo->id_ciclo)
                ->get();

        $ciclos = Ciclo::where('condicion',1)->get();
        $personas = Persona::where('tipo_persona', 'padre')->where('condicion',1)->get();
        return view('inscripcion.edit',compact('inscripcion', 'alumnos', 'planes', 'grados', 'ciclos', 'personas'));
    }

    public function store(InscripcionFormRequest $request)
    {
        $inscripcion = (new Inscripcion)->fill($request->all());

        $date = Carbon::now();
        $inscripcion->fecha = $date;
        $inscripcion->condicion = 1;
        $inscripcion->save();

        for($i = 1; $i <= $inscripcion->plan->cantidad; $i++)
        {
            $pago = new PagoMensualidad();
            $pago->id_inscripcion = $inscripcion->id_inscripcion;
            $pago->id_mensualidad = $i;
            $pago->anio = $inscripcion->ciclo->anio;
            $pago->save();
        }

        return redirect()->route('inscripcion.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumno' => 'required|integer',
            'id_ciclo' => 'required|integer',
            'id_grado' => 'required|integer',
            'id_persona' => 'required|integer',
            'pago_inscripcion' => 'nullable|numeric',
            'cuota' => 'required|numeric'
          ]);

        Inscripcion::findOrFail($id)->update($request->all());
        return redirect()->route('inscripcion.index');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('valor')){
            $inscripcion = Inscripcion::findOrFail($id);
            $inscripcion->condicion = $request->valor;
            $inscripcion->update();
        }

        return redirect()->route('inscripcion.index');
    }
}
