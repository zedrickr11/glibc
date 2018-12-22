<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlumnoFormRequest;
use App\Alumno;
use App\Persona;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view ('alumno.index',compact('alumnos'));
    }

    public function create()
    {
        $personas = Persona::where('tipo_persona', 'padre')->get();
        return view('alumno.create', compact('personas'));
    }

    public function store(AlumnoFormRequest $request)
    {
        $alumno = (new Alumno)->fill($request->all());

        $nombre_foto = null;
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nombre_foto = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/fotos/', $nombre_foto);
        }

        $nombre_fe_edad = null;
        if($request->hasFile('fe_edad')){
            $file = $request->file('fe_edad');
            $nombre_fe_edad = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/fe_edad/', $nombre_fe_edad);
        }

        $alumno->condicion = 1;
        $alumno->foto = $nombre_foto;
        $alumno->fe_edad = $nombre_fe_edad;
        $alumno->save();

        if($request->has('opcion')){
            if($request->opcion == 'modal')
            return redirect()->route('inscripcion.create');
        }
        else {
            return redirect()->route('alumno.index');
        }
    }

    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumno.show', compact('alumno'));
    }

    public function edit($id)
    {
        $personas = Persona::where('tipo_persona', 'padre')->get();
        $alumno = Alumno::findOrFail($id);
        return view('alumno.edit',compact('alumno', 'personas'));
    }

    public function update(AlumnoFormRequest $request, $id)
    {
        $al = Alumno::findOrFail($id);
        $alumno = ($al)->fill($request->all());

        $nombre_foto = null;
        if($request->hasFile('foto')){
            $archivo = public_path().'/fotos/'.$al->foto;
            Storage::delete($archivo);
            $file = $request->file('foto');
            $nombre_foto = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/fotos/', $nombre_foto);
        }

        $nombre_fe_edad = null;
        if($request->hasFile('fe_edad')){
            $archivo = public_path().'/fe_edad/'.$al->fe_edad;
            Storage::delete($archivo);
            $file = $request->file('fe_edad');
            $nombre_fe_edad = uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/fe_edad/', $nombre_fe_edad);
        }

        $alumno->foto = $request->hasFile('foto') ? $nombre_foto : $al->foto;
        $alumno->fe_edad = $request->hasFile('fe_edad') ? $nombre_fe_edad : $al->fe_edad;

        $alumno->save();

        return redirect()->route('alumno.index');
    }

    public function destroy(Request $request, $id)
    {
        if($request->has('valor')){
            $alumno = Alumno::findOrFail($id);
            $alumno->condicion = $request->valor;
            $alumno->update();
        }

      return redirect()->route('alumno.index');
    }

    public function downloadFeEdad($file){
        $pathtoFile = public_path().'/fe_edad/'.$file;
        return response()->file($pathtoFile);
    }
}
