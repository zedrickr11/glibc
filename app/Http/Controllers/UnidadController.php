<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnidadFormRequest;
use App\Unidad;

class UnidadController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
   }
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $unidades = Unidad::all();
    return view ('unidad.index',compact('unidades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('unidad.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UnidadFormRequest $request)
  {
    $unidad = (new Unidad)->fill($request->all());
    $unidad->condicion = 1;
    $unidad->save();

    return redirect()->route('unidad.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $unidad = Unidad::findOrFail($id);
    return view('unidad.show', compact('unidad'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $unidad = Unidad::findOrFail($id);
    return view('unidad.edit',compact('unidad'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UnidadFormRequest $request, $id)
  {
      Unidad::findOrFail($id)->update($request->all());
      return redirect()->route('unidad.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    if($request->has('valor')){
      $unidad = Unidad::findOrFail($id);
      $unidad->condicion = $request->valor;
      $unidad->update();
    }
    return redirect()->route('unidad.index');
  }

}
