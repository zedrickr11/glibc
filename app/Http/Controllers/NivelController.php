<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NivelFormRequest;
use App\Nivel;

class NivelController extends Controller
{
    public function index()
    {
        $niveles = Nivel::all();
        return view ('nivel.index',compact('niveles'));
    }

    public function create()
    {
        return view('nivel.create');
    }

    
    public function show($id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('nivel.show', compact('nivel'));
    }

    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('nivel.edit',compact('nivel'));
    }

    public function store(NivelFormRequest $request)
    {
        Nivel::create($request->all());
        return redirect()->route('nivel.index');
    }

    public function update(NivelFormRequest $request, $id)
    {
        Nivel::findOrFail($id)->update($request->all());
        return redirect()->route('nivel.index');
    }

    public function destroy($id)
    {
        $nivel = Nivel::findOrFail($id);
        $nivel->condicion = '0';
        $nivel->update();
        return redirect()->route('nivel.index');
    }
}