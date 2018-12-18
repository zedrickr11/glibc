<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarreraFormRequest;
use App\Carrera;
use App\Nivel;

class CarreraController extends Controller
{

    public function index()
    {
        $carreras = Carrera::all();
        return view ('carrera.index',compact('carreras'));
    }

    public function create()
    {
        $niveles = Nivel::all();
        return view('carrera.create', compact('niveles'));
    }

    public function store(CarreraFormRequest $request)
    {
        Carrera::create($request->all());
        return redirect()->route('carrera.index');
    }

    public function show($id)
    {
        $carrera = Carrera::findOrFail($id);
        return view('carrera.show', compact('carrera'));
    }

    public function edit($id)
    {
        $niveles = Nivel::all();
        $carrera = Carrera::findOrFail($id);
        return view('carrera.edit',compact('carrera', 'niveles'));
    }

    public function update(CarreraFormRequest $request, $id)
    {
        Carrera::findOrFail($id)->update($request->all());
        return redirect()->route('carrera.index');
    }

    public function destroy($id)
    {
      $carrera = Carrera::findOrFail($id);
      $carrera->condicion = '0';
      $carrera->update();
      return redirect()->route('carrera.index');
    }
}
