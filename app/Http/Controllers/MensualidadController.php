<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensualidad;

class MensualidadController extends Controller
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
            $mensualidades = Mensualidad::orderBy($sort_by, $direction)->get();
        }
        else {
            $mensualidades = Mensualidad::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return response()->json($mensualidades);
    }

    
    public function view(Request $request)
    {
        $mensualidad = Mensualidad::findOrFail($request->id);

        return response()->json($mensualidad);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'fecha_limite' => 'required|date'
        ]);

        $mensualidad = new Mensualidad();
        $mensualidad->nombre = $request->nombre;
        $mensualidad->fecha_limite = $request->fecha_limite;
        $mensualidad->save();
        
        return response()->json(['id' => $mensualidad->id]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string',
            'fecha_limite' => 'nullable|date'
        ]);
        
        $mensualidad = Mensualidad::findOrFail($request->id);
        $mensualidad->nombre = $request->has('nombre') ? $request->nombre : $mensualidad->nombre;
        $mensualidad->fecha_limite = $request->has('fecha_limite') ? $request->fecha_limite : $mensualidad->fecha_limite;
        
        $condicion = $mensualidad->save();

        return response()->json(['success' => $condicion]);
    }

    public function delete(Request $request)
    {
        $mensualidad = Mensualidad::findOrFail($request->id);
        $condicion = $mensualidad->delete();

        return response()->json(['success' => $condicion]);
    }
}
