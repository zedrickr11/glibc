<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoMensualidad;

class PagoMensualidadController extends Controller
{
    public function index()
    {
      $pagosmensualidades = PagoMensualidad::all();
      return view ('pagomensualidad.index',compact('pagosmensualidades'));
    }
   
    public function create()
    {
        return view('pagomensualidad.create');
    }

    public function store(MensualidadFormRequest $request)
    {
        $pagomensualidad = (new PagoMensualidad)->fill($request->all());
        $pagomensualidad->save();
        return redirect()->route('pagomensualidad.index');
    }

    public function show($id)
    {
      $pagomensualidad = PagoMensualidad::findOrFail($id);
      return view('pagomensualidad.show', compact('pagomensualidad'));
    }

    public function edit($id)
    {
      $pagomensualidad = PagoMensualidad::findOrFail($id);
      return view('pagomensualidad.edit',compact('pagomensualidad'));
    }

    public function update(MensualidadFormRequest $request, $id)
    {
        PagoMensualidad::findOrFail($id)->update($request->all());
        return redirect()->route('pagomensualidad.index');
    }

    public function destroy(Request $request, $id)
    {
      if($request->has('valor')){
        $pagomensualidad = PagoMensualidad::findOrFail($id);
        $pagomensualidad->update();
      }
      return redirect()->route('pagomensualidad.index');
    }
}
