<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscripcionFormRequest;
use App\Inscripcion;
use App\Alumno;
use App\Detalle;
use App\Plan;
use App\Persona;
use Carbon\Carbon;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view ('inscripcion.index',compact('inscripciones'));
    }

    public function create()
    {
        $alumnos = Alumno::all();
        $planes = Plan::all();
        $detalles = Detalle::all();
        $personas = Persona::all();
        return view('inscripcion.create', compact('alumnos', 'planes', 'detalles', 'personas'));
    }

    
    public function show($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripcion.show', compact('inscripcion'));
    }

    public function edit($id)
    {
        $alumnos = Alumno::all();
        $planes = Plan::all();
        $detalles = Detalle::all();
        $personas = Persona::all();
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripcion.edit',compact('inscripcion', 'alumnos', 'planes', 'detalles', 'personas'));
    }

    public function store(InscripcionFormRequest $request)
    {
        $inscripcion = (new Inscripcion)->fill($request->all());

        $date = Carbon::now();
        $inscripcion->fecha = $date;
        $inscripcion->save();

        return redirect()->route('inscripcion.index');
    }

    public function update(InscripcionFormRequest $request, $id)
    {
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
