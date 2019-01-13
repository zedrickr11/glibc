<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MensualidadFormRequest;
use App\Mensualidad;

class MensualidadController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
   }

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
        $mensualidad = (new Mensualidad)->fill($request->all());
        $mensualidad->condicion = 1;
        $mensualidad->save();
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

    public function update(Request $request, $id)
    {
      $request->validate([
        'dia_limite' => 'required|integer|min:1|max:31'
      ]);

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
