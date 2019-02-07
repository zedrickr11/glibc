<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\TipoActividad;
use App\AsignacionCurso;
use App\Unidad;
use App\Nota;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Redirect;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin,prof');
   }
   public function create()
   {

   }

   public function store(Request $request)
   {
     Nota::updateOrCreate(
      [
        'id_actividad' => $request->id_actividad,

        'id_alumno' => $request->id_alumno
      ],
      [
        'id_actividad' => $request->id_actividad,
        'nota' => $request->nota,
        'id_alumno' => $request->id_alumno
      ]
      );
            // Nota::create($request->all());
       return back();
   }


   public function edit($id_grado,$id_curso,$asignacion,$id)
   {
     $actividad=Actividad::findOrFail($id);
     $tipos=TipoActividad::where('condicion',1)->get();
     $unidades = Unidad::where('condicion',1)->get();
     $grado=$id_grado;
     $curso=$id_curso;
     $id_asignacion=$asignacion;
     return view('notas.edit', compact('actividad','tipos','unidades','grado','curso','id_asignacion'));
   }

   public function update(ActividadFormRequest $request, $id, $id_grado,$id_curso)
   {
     $anio = Carbon::now()->format('Y');
     $act = Actividad::findOrFail($id);
     $actividad = ($act)->fill($request->all());
     $actividad->anio=$anio;
     $actividad->update();
     $grado=$id_grado;
     $curso=$id_curso;
     return redirect()->route('notas.actividades',[$grado,$curso]);
   }
}
