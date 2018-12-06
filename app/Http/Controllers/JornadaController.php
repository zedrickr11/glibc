<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JornadaFormRequest;
use App\Jornada;

class JornadaController extends Controller
{
    public function index()
    {
        $jornadas = Jornada::all();
        return view ('jornada.index',compact('jornadas'));
    }

    public function create()
    {
        return view('jornada.create');
    }

    
    public function show($id)
    {
        $jornada = Jornada::findOrFail($id);
        return view('jornada.show', compact('jornada'));
    }

    public function edit($id)
    {
        $jornada = Jornada::findOrFail($id);
        return view('jornada.edit',compact('jornada'));
    }

    public function store(JornadaFormRequest $request)
    {
        Jornada::create($request->all());
        return redirect()->route('jornada.index');
    }

    public function update(JornadaFormRequest $request, $id)
    {
        Jornada::findOrFail($id)->update($request->all());
        return redirect()->route('jornada.index');
    }

    public function destroy($id)
    {
        $jornada = jornada::findOrFail($id);
        $jornada->condicion = '0';
        $jornada->update();
        return redirect()->route('jornada.index');
    }
}
