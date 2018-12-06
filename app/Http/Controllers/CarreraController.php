<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;

class CarreraController extends Controller
{
    
    public function list(Request $request)
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
            $carreras = Carrera::orderBy($sort_by, $direction)->get();
        }
        else {
            $carreras = Carrera::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return response()->json($carreras);
    }

    
    public function view(Request $request)
    {
        $carrera = Carrera::findOrFail($request->id);

        return response()->json($carrera);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'condicion' => 'required|boolean',
            'id_nivel' => 'required|integer'
        ]);

        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->condicion = $request->condicion;
        $carrera->id_nivel = $request->id_nivel;
        $carrera->save();
        
        return response()->json(['id' => $carrera->id]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string',
            'condicion' => 'nullable|boolean',
            'id_nivel' => 'nullable|integer'
        ]);
        
        $carrera = Carrera::findOrFail($request->id);
        $carrera->nombre = $request->has('nombre') ? $request->nombre : $carrera->nombre;
        $carrera->condicion = $request->has('condicion') ? $request->condicion : $carrera->condicion;
        $carrera->id_nivel = $request->has('id_nivel') ? $request->id_nivel : $carrera->id_nivel;
        
        $condicion = $carrera->save();

        return response()->json(['success' => $condicion]);
    }

    public function delete(Request $request)
    {
        $carrera = Carrera::findOrFail($request->id);
        $condicion = $carrera->delete();

        return response()->json(['success' => $condicion]);
    }
}
