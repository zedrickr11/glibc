<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TipoActividadFormRequest;
use App\TipoActividad;

class TipoActividadController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipoactividad=TipoActividad::all()->where('condicion','1');;
      return view ('tipoactividad.index',compact('tipoactividad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoactividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoActividadFormRequest $request)
    {
      TipoActividad::create($request->all());
      return redirect()->route('tipo-actividad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tipoactividad=TipoActividad::findOrFail($id);
      return view('tipoactividad.show', compact('tipoactividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tipoactividad=TipoActividad::findOrFail($id);
      return view('tipoactividad.edit',compact('tipoactividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoActividadFormRequest $request, $id)
    {
        TipoActividad::findOrFail($id)->update($request->all());
        return redirect()->route('tipo-actividad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $tipoactividad = TipoActividad::findOrFail($id);
      $tipoactividad->condicion = '0';
      $tipoactividad->update();
      return redirect()->route('tipo-actividad.index');
    }
}
