<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscripcionFormRequest;
use App\Inscripcion;
use App\Alumno;
use App\Grado;
use App\Plan;
use App\Persona;
use App\PagoMensualidad;

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
        $grados = Grado::all();
        $personas = Persona::where('tipo_persona', 'padre')->get();
        return view('inscripcion.create', compact('alumnos', 'planes', 'grados', 'personas'));
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
        $grados = Grado::all();
        $personas = Persona::all();
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripcion.edit',compact('inscripcion', 'alumnos', 'planes', 'grados', 'personas'));
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
            $pago->id_mora = 1;
            $pago->save();
        }

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
