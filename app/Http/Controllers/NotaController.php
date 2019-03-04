<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\TipoActividad;
use App\AsignacionCurso;
use App\Unidad;
use App\Nota;
use App\Grado;
//use App\Unidad;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Redirect;
use Illuminate\Support\Facades\Auth;
use PDF;
class NotaController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin,prof');
   }
   public function create()
   {

   }

   public function store(Request $request)
   {
     Nota::updateOrCreate(
      [
        'id_actividad' => $request->id_actividad,

        'id_alumno' => $request->id_alumno
      ],
      [
        'id_actividad' => $request->id_actividad,
        'nota' => $request->nota,
        'id_alumno' => $request->id_alumno
      ]
      );
            // Nota::create($request->all());
       return back();
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

   public function cursoUnidad(Request $request, $id,$idCurso,$idUnidad)
   {
     $grado = Grado::findOrFail($id);
     $prof_curso=DB::table('asignacion_curso as asig')
                    ->join('persona as p','p.id_persona','asig.id_persona')
                    ->select('p.id_persona','p.nombres','p.apellidos')
                    ->where('asig.id_grado',$id)
                    ->where('asig.id_curso',$idCurso)
                    ->first();
     $ano = Carbon::now()->format('Y');
     //$inscripcion = Inscripcion::where('id_grado', $id)->ciclo->where('anio', $ano)->get();
     //$inscripcion = Ciclo::where('anio', $ano)->get();
     $unidades=Unidad::where('id_unidad',$idUnidad)->first();
     $tipoActividad = TipoActividad::all();
     $actividades=DB::table('actividad as act')
     ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
     ->select('*')
     ->where('act.id_unidad',$idUnidad)
     ->where('act.anio',$ano)
     ->where('asig.id_grado',$id)
     ->where('asig.id_curso',$idCurso)
     ->get();
     $cont1=DB::table('actividad as act')
     ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
     ->select(DB::raw('count(act.id_tipo_actividad) as cont1'))
     ->where('act.id_unidad',$idUnidad)
     ->where('act.anio',$ano)
     ->where('asig.id_grado',$id)
     ->where('asig.id_curso',$idCurso)
     ->where('act.id_tipo_actividad',1)
     ->first();
     $cont2=DB::table('actividad as act')
     ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
     ->select(DB::raw('count(act.id_tipo_actividad) as cont2'))
     ->where('act.id_unidad',$idUnidad)
     ->where('act.anio',$ano)
     ->where('asig.id_grado',$id)
     ->where('asig.id_curso',$idCurso)
     ->where('act.id_tipo_actividad',2)
     ->first();
     $cont3=DB::table('actividad as act')
     ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
     ->select(DB::raw('count(act.id_tipo_actividad) as cont3'))
     ->where('act.id_unidad',$idUnidad)
     ->where('act.anio',$ano)
     ->where('asig.id_grado',$id)
     ->where('asig.id_curso',$idCurso)
     ->where('act.id_tipo_actividad',3)
     ->first();
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

     $inscripcion_pago = $inscripciones->pluck('inscripcion.id_alumno');

     $inscripcion_info = $inscripciones->select('inscripcion.id_inscripcion', 'alumno.primer_nombre', 'alumno.segundo_nombre', 'alumno.tercer_nombre',
                               'alumno.primer_apellido', 'alumno.segundo_apellido', 'grado.nombre as grado_nombre',
                               'seccion.nombre as seccion_nombre', 'jornada.nombre as jornada_nombre', 'ciclo.anio as ciclo_ano',
                               'plan.nombre as plan_nombre', 'plan.cantidad as plan_cantidad' ,'inscripcion.cuota', 'inscripcion.pago_inscripcion')
                               ->orderBy('alumno.primer_apellido', 'asc')
                               ->orderBy('alumno.segundo_apellido', 'asc')
                               ->get();
     $notas=DB::table('tipo_actividad as ta')
                ->join('actividad as act','ta.id_tipo_actividad','act.id_tipo_actividad')
                ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
                ->join('nota as n', 'n.id_actividad','act.id_actividad')
                ->join('alumno as a','a.id','n.id_alumno')
                ->select('a.id as id_alumno','a.primer_nombre','act.id_tipo_actividad','act.nombre','act.id_actividad','n.nota')
                ->where('act.id_unidad',$idUnidad)
                ->where('act.anio',$ano)
                ->where('asig.id_grado',$id)
                ->where('asig.id_curso',$idCurso)
                ->whereIn('a.id',$inscripcion_pago)

                ->get();
    $total_prom=DB::table('tipo_actividad as ta')
               ->join('actividad as act','ta.id_tipo_actividad','act.id_tipo_actividad')
               ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
               ->join('nota as n', 'n.id_actividad','act.id_actividad')
               ->join('alumno as a','a.id','n.id_alumno')
               ->select('a.id as id_alumno',DB::raw('SUM(n.nota) as total'),DB::raw('AVG(n.nota) as prom'))
               ->where('act.id_unidad',$idUnidad)
               ->where('act.anio',$ano)
               ->where('asig.id_grado',$id)
               ->where('asig.id_curso',$idCurso)
               ->whereIn('a.id',$inscripcion_pago)
               ->groupBy('a.id')
               ->get();
               $zona=DB::table('tipo_actividad as ta')
                          ->join('actividad as act','ta.id_tipo_actividad','act.id_tipo_actividad')
                          ->join('asignacion_curso as asig','asig.id_asignacion_curso','act.id_asignacion_curso')
                          ->join('nota as n', 'n.id_actividad','act.id_actividad')
                          ->join('alumno as a','a.id','n.id_alumno')
                          ->select('a.id as id_alumno',DB::raw('SUM(n.nota) as zona'))
                          ->where('act.id_unidad',$idUnidad)
                          ->where('act.anio',$ano)
                          ->where('asig.id_grado',$id)
                          ->where('asig.id_curso',$idCurso)
                          ->whereBetween('act.id_tipo_actividad',[1,2])
                          ->whereIn('a.id',$inscripcion_pago)
                          ->groupBy('a.id')
                          ->get();

//dd($total_prom);

     $data = ['inscripcion_info' => $inscripcion_info,'grado'=>$grado,'notas'=>$notas,
     'tipoActividad'=>$tipoActividad,'actividades'=>$actividades,'total_prom'=>$total_prom,
     'cont1'=>$cont1,'cont2'=>$cont2,'cont3'=>$cont3,'zona'=>$zona,'unidades'=>$unidades,
      'prof_curso'=>$prof_curso];
     $pdf = PDF::loadView('notas.cuadrounidad', $data);
     $pdf->setPaper('A4', 'landscape');
     return $pdf->stream('Cuadro de registro ' . $grado->nombre . ' Seccion ' . $grado->seccionAsignada->nombre . ' ' . $grado->carrera->jornada->nombre . '.pdf');

   }
}
