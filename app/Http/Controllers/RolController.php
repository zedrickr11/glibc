<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolFormRequest;

use App\Rol;

class RolController extends Controller
{
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
        Rol::create($request->all());
        return redirect()->route('rol.index');
    }

    public function update(RolFormRequest $request, $id)
    {
        Rol::findOrFail($id)->update($request->all());
        return redirect()->route('rol.index');
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->condicion = '0';
        $rol->update();
        return redirect()->route('rol.index');
    }
}
