<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuota;

class CuotaController extends Controller
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
            $cuotas = Cuota::orderBy($sort_by, $direction)->get();
        }
        else {
            $cuotas = Cuota::orderBy($sort_by, $direction)->paginate($many);
        }
        
        return response()->json($cuotas);
    }

    
    public function view(Request $request)
    {
        $cuota = Cuota::findOrFail($request->id);

        return response()->json($cuota);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'cantidad' => 'required|float'
        ]);

        $cuota = new Cuota();
        $cuota->nombre = $request->nombre;
        $cuota->cantidad = $request->cantidad;
        $cuota->save();
        
        return response()->json(['id' => $cuota->id]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string',
            'cantidad' => 'nullable|float'
        ]);
        
        $cuota = Cuota::findOrFail($request->id);
        $cuota->nombre = $request->has('nombre') ? $request->nombre : $cuota->nombre;
        $cuota->cantidad = $request->has('cantidad') ? $request->cantidad : $cuota->cantidad;
        
        $condicion = $cuota->save();

        return response()->json(['success' => $condicion]);
    }

    public function delete(Request $request)
    {
        $cuota = Cuota::findOrFail($request->id);
        $condicion = $cuota->delete();

        return response()->json(['success' => $condicion]);
    }
}
