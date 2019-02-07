<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CuotaFormRequest;
use App\Cuota;

class CuotaController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin,director,secre');
   }
    public function index()
    {
        $cuotas = Cuota::where('condicion', '1')->get();
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
        $cuota = (new Cuota)->fill($request->all());
        $cuota->condicion = 1;
        $cuota->save();
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
