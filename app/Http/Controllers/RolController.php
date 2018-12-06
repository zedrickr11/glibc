<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'many' => 'nullable|integer',
            'sort_by' => 'nullable|string',
            'direction' => 'nullable|string'
        ]);

        //Asignar valores de paginacion, ordenamiento y direccion de ordenamiento
        $many = 10;
        if($request->has('many')) $many = $request->many;
        
        $sort_by = 'nombre';
        if($request->has('sort_by')) $sort_by = $request->sort_by;

        $direction = 'asc';
        if($request->has('direction')) $direction = $request->direction;
        
        if($request->has('all')) {
            $roles = Rol::orderBy($sort_by, $direction)->get();
        }
        else {
            $roles = Rol::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return view('rol.index', compact('roles'));
    }

    public function create()
    {
        return view('rol.create');
    }

    
    public function show(Request $request)
    {
        $rol = Rol::findOrFail($request->id);

        return response()->json($rol);
    }

    public function edit(Request $request)
    {
        $rol = Rol::findOrFail($request->id);

        return response()->json($rol);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'condicion' => 'required|integer',
            'display_name' => 'nullable|string',
        ]);

        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->condicion = $request->condicion;
        $rol->display_name = $request->display_name;

        $rol->save();
        
        return response()->json(['id' => $rol->id]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'condicion' => 'required|integer',
            'display_name' => 'nullable|string',
        ]);
        
        $rol = Rol::findOrFail($request->id);
        $rol->nombre = $request->has('nombre') ? $request->nombre : $rol->nombre;
        $rol->descripcion = $request->has('descripcion') ? $request->descripcion : $rol->descripcion;
        $rol->condicion = $request->has('condicion') ? $request->condicion : $rol->condicion;
        $rol->display_name = $request->has('display_name') ? $request->display_name : $rol->display_name;
        
        $condicion = $rol->save();

        return response()->json(['success' => $condicion]);
    }

    public function destroy(Request $request)
    {
        $rol = Rol::findOrFail($request->id);
        $condicion = $rol->delete();

        return response()->json(['success' => $condicion]);
    }
}
