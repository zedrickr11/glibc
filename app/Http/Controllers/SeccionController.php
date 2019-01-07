<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SeccionFormRequest;
use App\Seccion;

class SeccionController extends Controller
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
    $seccion=Seccion::all()->where('condicion','1');;
    return view ('seccion.index',compact('seccion'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('seccion.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(SeccionFormRequest $request)
  {
    $seccion = (new Seccion)->fill($request->all());
    $seccion->condicion = 1;
    $seccion->save();
    return redirect()->route('seccion.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $seccion=Seccion::findOrFail($id);
    return view('seccion.show', compact('seccion'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $seccion=Seccion::findOrFail($id);
    return view('seccion.edit',compact('seccion'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(SeccionFormRequest $request, $id)
  {
      Seccion::findOrFail($id)->update($request->all());
      return redirect()->route('seccion.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $seccion = Seccion::findOrFail($id);
    $seccion->condicion = '0';
    $seccion->update();
    return redirect()->route('seccion.index');
  }
}
