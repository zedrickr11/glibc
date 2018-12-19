<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\GradoFormRequest;
use App\Grado;
use App\Persona;
use App\Ciclo;
use App\Seccion;
use App\Curso;
use App\AsignacionCurso;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::orderBy('id_ciclo', 'asc')->get();
        return view ('grado.index',compact('grados'));
    }

    public function create()
    {
        $personas = Persona::where('tipo_persona', 'maestro')->get();
        $ciclos = Ciclo::where('condicion', '1')->get();
        $secciones = Seccion::where('condicion', '1')->get();
        return view('grado.create', compact('personas', 'ciclos', 'secciones'));
    }

    
    public function show($id)
    {
        $grado = Grado::findOrFail($id);
        return view('grado.show', compact('grado'));
    }

    public function edit($id)
    {
        $personas = Persona::where('tipo_persona', 'maestro')->get();
        $ciclos = Ciclo::all();
        $secciones = Seccion::where('condicion', '1')->get();
        $grado = Grado::findOrFail($id);
        return view('grado.edit',compact('grado', 'personas', 'ciclos', 'secciones'));
    }

    public function store(GradoFormRequest $request)
    {
        Grado::create($request->all());
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
        $cursos = Curso::all();
        $personas = Persona::all();
        $grado = Grado::findOrFail($id);
        return view('grado.asignacion',compact('grado', 'cursos', 'personas'));
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
        
        $asignacion_curso = new AsignacionCurso();
        $asignacion_curso->id_grado = $request->id_grado;
        $asignacion_curso->id_curso = $request->id_curso;
        $asignacion_curso->id_persona = $request->id_persona;
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
