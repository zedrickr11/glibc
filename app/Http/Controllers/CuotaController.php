<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CuotaFormRequest;
use App\Cuota;

class CuotaController extends Controller
{
    public function index()
    {
        $cuotas = Cuota::all();
        return view ('cuota.index',compact('cuotas'));
    }

    public function create()
    {
        return view('cuota.create');
    }

    
    public function show($id)
    {
        $cuota = Cuota::findOrFail($id);
        return view('cuota.show', compact('cuota'));
    }

    public function edit($id)
    {
        $cuota = Cuota::findOrFail($id);
        return view('cuota.edit',compact('cuota'));
    }

    public function store(CuotaFormRequest $request)
    {
        Cuota::create($request->all());
        return redirect()->route('cuota.index');
    }

    public function update(CuotaFormRequest $request, $id)
    {
        Cuota::findOrFail($id)->update($request->all());
        return redirect()->route('cuota.index');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('valor')){
            $cuota = Cuota::findOrFail($id);
            $cuota->condicion = $request->valor;
            $cuota->update();
        }
        return redirect()->route('cuota.index');
    }
}
