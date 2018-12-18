<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GradoFormRequest;
use App\Grado;
use App\Persona;
use App\Ciclo;
use App\Seccion;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
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

    public function listCursos($id)
    {
        $personas = Persona::where('tipo_persona', 'maestro')->get();
        $grado = Grado::findOrFail($id);
        return view('grado.cursos',compact('grado', 'personas'));
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
}
