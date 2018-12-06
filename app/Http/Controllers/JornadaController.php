<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornada;

class JornadaController extends Controller
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
            $jornadas = Jornada::orderBy($sort_by, $direction)->get();
        }
        else {
            $jornadas = Jornada::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return response()->json($jornadas);
    }

    
    public function view(Request $request)
    {
        $jornada = Jornada::findOrFail($request->id);

        return response()->json($jornada);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'condicion' => 'required|boolean'
        ]);

        $jornada = new Jornada();
        $jornada->nombre = $request->nombre;
        $jornada->condicion = $request->condicion;
        $jornada->save();
        
        return response()->json(['id' => $jornada->id]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string',
            'condicion' => 'nullable|boolean'
        ]);
        
        $jornada = Jornada::findOrFail($request->id);
        $jornada->nombre = $request->has('nombre') ? $request->nombre : $jornada->nombre;
        $jornada->condicion = $request->has('condicion') ? $request->condicion : $jornada->condicion;
        
        $condicion = $jornada->save();

        return response()->json(['success' => $condicion]);
    }

    public function delete(Request $request)
    {
        $jornada = Jornada::findOrFail($request->id);
        $condicion = $jornada->delete();

        return response()->json(['success' => $condicion]);
    }
}
