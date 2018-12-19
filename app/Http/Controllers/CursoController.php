<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CursoFormRequest;
use App\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso=Curso::all()->where('condicion','1');;
        return view ('curso.index',compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoFormRequest $request)
    {
        Curso::create($request->all());

        if($request->has('opcion')){
            if($request->opcion == 'modal')
                return redirect()->back();
        }
        else {
            return redirect()->route('curso.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso=Curso::findOrFail($id);
        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso=Curso::findOrFail($id);
        return view('curso.edit',compact('curso'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoFormRequest $request, $id)
    {

        Curso::findOrFail($id)->update($request->all());
        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $curso = Curso::findOrFail($id);
      $curso->condicion = '0';
      $curso->update();
      return redirect()->route('curso.index');
    }
}
