<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarreraFormRequest;
use App\Carrera;
use App\Jornada;

class CarreraController extends Controller
{

    public function index()
    {
        $carreras = Carrera::all();
        return view ('carrera.index',compact('carreras'));
    }

    public function create()
    {
        $jornada = Jornada::all();
        return view('carrera.create', compact('jornada'));
    }

    public function store(CarreraFormRequest $request)
    {
        $carrera =  (new Carrera)->fill($request->all());
        $carrera->condicion="1";
        $carrera->save();
        return redirect()->route('carrera.index');
    }

    public function show($id)
    {
        $carrera = Carrera::findOrFail($id);
        return view('carrera.show', compact('carrera'));
    }

    public function edit($id)
    {
        $jornada = Jornada::all();
        $carrera = Carrera::findOrFail($id);
        return view('carrera.edit',compact('carrera', 'jornada'));
    }

    public function update(CarreraFormRequest $request, $id)
    {
        $carr = Carrera::findOrFail($id);
        $carrera = ($carr)->fill($request->all());
        $carrera->condicion="1";
        $carrera->update();
        return redirect()->route('carrera.index');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('valor')){
            $carrera = Carrera::findOrFail($id);
            $carrera->condicion = $request->valor;
            $carrera->update();
        }
        return redirect()->route('carrera.index');
    }
}
