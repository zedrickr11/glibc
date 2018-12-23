<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CicloFormRequest;
use App\Ciclo;
use App\Carrera;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ciclo=Ciclo::all()->where('condicion','1');;
      return view ('ciclo.index',compact('ciclo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carrera::all()->where('condicion',1);
        return view('ciclo.create',compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CicloFormRequest $request)
    {
      $ciclo = (new Ciclo)->fill($request->all());
      $ciclo->condicion = 1;
      $ciclo->save();

      $carrera = $request->id_carrera;
      $ciclo->carreras()->attach($carrera);

      return redirect()->route('ciclo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ciclo=Ciclo::findOrFail($id);
      return view('ciclo.show', compact('ciclo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ciclo=Ciclo::findOrFail($id);
      $carreras=Carrera::pluck('nombre','id');
      return view('ciclo.edit',compact('ciclo','carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CicloFormRequest $request, $id)
    {
        $c = Ciclo::findOrFail($id);
        $ciclo = ($c)->fill($request->all());
        $ciclo->condicion=1;
        $ciclo->update();
        $ciclo->carreras()->sync($request->id_carrera);
        return redirect()->route('ciclo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $ciclo = Ciclo::findOrFail($id);
      $ciclo->condicion = '0';
      $ciclo->update();
      return redirect()->route('ciclo.index');
    }
}
