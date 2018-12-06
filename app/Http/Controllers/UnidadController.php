<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;

class UnidadController extends Controller
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
            $unidades = Unidad::orderBy($sort_by, $direction)->get();
        }
        else {
            $unidades = Unidad::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return response()->json($unidades);
    }

    
    public function view(Request $request)
    {
        $unidad = Unidad::findOrFail($request->id);

        return response()->json($unidad);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string'
        ]);

        $unidad = new Unidad();
        $unidad->nombre = $request->nombre;
        $unidad->save();
        
        return response()->json(['id' => $unidad->id]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string'
        ]);
        
        $unidad = Unidad::findOrFail($request->id);
        $unidad->nombre = $request->has('nombre') ? $request->nombre : $unidad->nombre;
        
        $condicion = $unidad->save();

        return response()->json(['success' => $condicion]);
    }

    public function delete(Request $request)
    {
        $unidad = Unidad::findOrFail($request->id);
        $condicion = $unidad->delete();

        return response()->json(['success' => $condicion]);
    }
}
