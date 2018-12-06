<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;

class NivelController extends Controller
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
            $niveles = Nivel::orderBy($sort_by, $direction)->get();
        }
        else {
            $niveles = Nivel::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return response()->json($niveles);
    }

    
    public function view(Request $request)
    {
        $nivel = Nivel::findOrFail($request->id);

        return response()->json($nivel);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        $nivel = new Nivel();
        $nivel->nombre = $request->nombre;
        $nivel->descripcion = $request->descripcion;
        $nivel->save();
        
        return response()->json(['id' => $nivel->id]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string',
            'descripcion' => 'nullable|string'
        ]);
        
        $nivel = Nivel::findOrFail($request->id);
        $nivel->nombre = $request->has('nombre') ? $request->nombre : $nivel->nombre;
        $nivel->descripcion = $request->has('descripcion') ? $request->descripcion : $nivel->descripcion;
        
        $condicion = $nivel->save();

        return response()->json(['success' => $condicion]);
    }

    public function delete(Request $request)
    {
        $nivel = Nivel::findOrFail($request->id);
        $condicion = $nivel->delete();

        return response()->json(['success' => $condicion]);
    }
}
