<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CursoFormRequest;
use App\Curso;
use App\Carrera;

class CursoController extends Controller
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
        $carreras = Carrera::where('condicion',1)->get();
        return view('curso.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoFormRequest $request)
    {
        $curso = (new Curso)->fill($request->all());
        $curso->condicion = 1;
        $curso->save();

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
        $carreras = Carrera::where('condicion',1)->get();
        $curso=Curso::findOrFail($id);
        return view('curso.edit',compact('curso', 'carreras'));
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
