<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MensualidadFormRequest;
use App\Mensualidad;

class MensualidadController extends Controller
{

    public function index()
    {
      $mensualidades = Mensualidad::all();
      return view ('mensualidad.index',compact('mensualidades'));
    }

   
    public function create()
    {
        return view('mensualidad.create');
    }

    public function store(MensualidadFormRequest $request)
    {
        Mensualidad::create($request->all());
        return redirect()->route('mensualidad.index');
    }

    public function show($id)
    {
      $mensualidad = Mensualidad::findOrFail($id);
      return view('mensualidad.show', compact('mensualidad'));
    }

    public function edit($id)
    {
      $mensualidad = Mensualidad::findOrFail($id);
      return view('mensualidad.edit',compact('mensualidad'));
    }

    public function update(MensualidadFormRequest $request, $id)
    {
        Mensualidad::findOrFail($id)->update($request->all());
        return redirect()->route('mensualidad.index');
    }

    public function destroy(Request $request, $id)
    {
      if($request->has('valor')){
        $mensualidad = Mensualidad::findOrFail($id);
        $mensualidad->condicion = $request->valor;
        $mensualidad->update();
      }
      return redirect()->route('mensualidad.index');
    }
}
