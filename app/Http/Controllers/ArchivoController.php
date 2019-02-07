<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArchivoFormRequest;
use App\Archivo;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function index()
    {
        $archivos = Archivo::where('condicion', 1)
                            ->orderBy('nombre', 'asc')
                            ->get();
        return view ('archivo.index',compact('archivos'));
    }

    public function create()
    {
        return view('archivo.create');
    }

    public function store(ArchivoFormRequest $request)
    {
        $archivo = (new Archivo)->fill($request->all());

        $nombre_archivo = null;
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $nombre_archivo = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/archivos/', $nombre_archivo);
        }

        $archivo->archivo = $nombre_archivo;
        $archivo->condicion = 1;
        $archivo->save();

        return redirect()->route('archivo.index');
    }

    public function edit($id)
    {
        $archivo = Archivo::findOrFail($id);
        return view('archivo.edit',compact('archivo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:250',
            'archivo' => 'nullable|file'
        ]);

        $ar = Archivo::findOrFail($id);
        $archivo = ($ar)->fill($request->all());

        $nombre_archivo = null;
        if($request->hasFile('archivo')){
            $archivo_borrar = public_path().'/archivos/'.$ar->archivo;
            Storage::delete($archivo_borrar);
            $file = $request->file('archivo');
            $nombre_archivo = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/archivos/', $nombre_archivo);
        }

        $archivo->archivo = $request->hasFile('archivo') ? $nombre_archivo : $ar->archivo;
        $archivo->save();

        return redirect()->route('archivo.index');
    }

    public function destroy(Request $request, $id)
    {
        $archivo = Archivo::findOrFail($id);
        $archivo->condicion = 0;
        $archivo->update();

        return redirect()->route('archivo.index');
    }

    public function downloadArchivo($id){
        $archivo = Archivo::findOrFail($id);

        $pathtoFile = public_path().'/archivos/'. $archivo->archivo;
        return response()->download($pathtoFile);
    }
}
