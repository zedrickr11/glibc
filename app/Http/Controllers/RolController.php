<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolFormRequest;

use App\Rol;

class RolController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
   }
    public function index()
    {
        $roles = Rol::all();
        return view ('rol.index',compact('roles'));
    }

    public function create()
    {
        return view('rol.create');
    }


    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return view('rol.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('rol.edit',compact('rol'));
    }

    public function store(RolFormRequest $request)
    {
        $rol = (new Rol)->fill($request->all());
        $rol->condicion = 1;
        $rol->save();
        return redirect()->route('rol.index');
    }

    public function update(RolFormRequest $request, $id)
    {
        Rol::findOrFail($id)->update($request->all());
        return redirect()->route('rol.index');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('valor')){
            $rol = Rol::findOrFail($id);
            $rol->condicion = $request->valor;
            $rol->update();
        }
        return redirect()->route('rol.index');
    }
}
