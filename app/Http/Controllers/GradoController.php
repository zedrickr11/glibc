<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\GradoFormRequest;
use App\Grado;
use App\Persona;
use App\Carrera;
use App\Seccion;
use App\Curso;
use App\Ciclo;
use App\AsignacionCurso;
use DB;
use Carbon\Carbon;

class GradoController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin');
   }
    public function index()
    {
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
        return view ('grado.index',compact('grados'));
        //return response()->json($grados);
    }

    public function create()
    {
        $personas = Persona::where('tipo_persona', 'maestro')->where('condicion', 1)->get();
        $secciones = Seccion::where('condicion', '1')->get();
        $carreras = Carrera::where('condicion', 1)->get();
        return view('grado.create', compact('personas', 'carreras', 'secciones'));
    }


    public function show($id)
    {
        $grado = Grado::findOrFail($id);
        return view('grado.show', compact('grado'));
    }

    public function edit($id)
    {
        $personas = Persona::where('tipo_persona', 'maestro')->where('condicion', 1)->get();
        $secciones = Seccion::where('condicion', '1')->get();
        $carreras = Carrera::where('condicion', 1)->get();
        $grado = Grado::findOrFail($id);
        return view('grado.edit',compact('grado', 'personas', 'carreras', 'secciones'));
    }

    public function store(GradoFormRequest $request)
    {
        $grado = (new Grado)->fill($request->all());
        $grado->condicion = 1;
        $grado->save();

        return redirect()->route('grado.index');
    }

    public function update(GradoFormRequest $request, $id)
    {
        Grado::findOrFail($id)->update($request->all());
        return redirect()->route('grado.index');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('valor')){
            $grado = Grado::findOrFail($id);
            $grado->condicion = $request->valor;
            $grado->update();
        }
        return redirect()->route('grado.index');
    }

    //METODOS PARA LA ASIGNACION DE CURSOS

    /**
     * Lista los cursos asignados a un grado en especifico
     */
    public function asignacion($id)
    {
        $ano = Carbon::now()->format('Y');
        $grado = Grado::findOrFail($id);
        $cursos_asignados = $grado->cursos->where('pivot.anio', $ano);
        $cursos = Curso::where('id_carrera', $grado->id_carrera)->where('condicion',1)->get();
        $personas = Persona::where('tipo_persona', 'maestro')->where('condicion',1)->get();
        $carreras = Carrera::all();
        return view('grado.asignacion',compact('grado', 'cursos', 'personas', 'carreras', 'cursos_asignados'));
    }

    /**
     * Metodo para asignar un curso a un grado
     */
    public function addAsignacion(Request $request)
    {
        $request->validate([
            'id_grado' => 'required|integer',
            'id_curso' => 'required|integer',
            'id_persona' => 'required|integer'
        ]);

        //$grado = Grado::findOrFail($request->id_grado);
        //$grado->cursos()->attach([ 1 => ['id_grado' => $request->id_grado], 2 =>  ['id_curso' => $request->id_curso], 3 => ['id_persona' => $request->id_persona]]);
        $ano = Carbon::now()->format('Y');

        $asignacion_curso = new AsignacionCurso();
        $asignacion_curso->id_grado = $request->id_grado;
        $asignacion_curso->id_curso = $request->id_curso;
        $asignacion_curso->id_persona = $request->id_persona;
        $asignacion_curso->anio = $ano;
        $asignacion_curso->save();

        return Redirect::back();
    }

    /**
     * Metodo para editar la asignacion de un curso
     */
    public function editAsignacion(Request $request, $id)
    {
        $request->validate([
            'id_curso' => 'required|integer',
            'id_persona' => 'required|integer'
        ]);

        $asignacion = AsignacionCurso::findOrFail($id);

        $asignacion->id_curso = $request->has('id_curso') ? $request->id_curso : $asignacion->id_curso;
        $asignacion->id_persona = $request->has('id_persona') ? $request->id_persona : $asignacion->id_persona;
        $asignacion->save();

        return Redirect::back();
    }

    /**
     * Metodo para eliminar la asignacion de un curso a un grado
     */
    public function deleteAsignacion($id)
    {
        $asignacion = AsignacionCurso::findOrFail($id);
        $asignacion->delete();

        return Redirect::back();
    }
}
