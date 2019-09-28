<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests\PersonaFormRequest;
use App\Http\Requests\UpdatePadre;

use App\Persona;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class PadreController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin,director');
   }


        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
          $persona=Persona::where('tipo_persona','padre')->where('condicion', 1)->orderBy('id_persona', 'desc')->get();
          return view ('padre.index',compact('persona'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('padre.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(PersonaFormRequest $request)
        {
          $persona=new Persona;
          $persona->nombres=$request->get('nombres');
          $persona->apellidos=$request->get('apellidos');
          $persona->email=$request->get('email');
          $persona->fechanacimiento=$request->get('fechanacimiento');
          $persona->estado_civil=$request->get('estado_civil');
          $persona->nacionalidad=$request->get('nacionalidad');
          $persona->profesion=$request->get('profesion');
          $persona->dpi=$request->get('dpi');
          $persona->direccion=$request->get('direccion');
          $persona->telefono=$request->get('telefono');
          $persona->telefono_dos=$request->get('telefono_dos');
          $persona->celular=$request->get('celular');
          $persona->condicion=1;
          if (Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/personas/fotos/',$file->getClientOriginalName());
              $persona->foto=$file->getClientOriginalName();
          }
          $persona->tipo_persona="padre";

          $persona->save();

          if($request->has('opcion')){
            if($request->opcion == 'modal'){
              //$personas = Persona::where('tipo_persona', 'padre')->get();
              //return view('alumno.create', compact('personas', 'id_padre'));
              $id_padre = $persona->id_persona;
              return redirect()->route('alumno.crear', ['idPadre' => $id_padre]);
            }
            if($request->opcion == 'porpasos'){
              $id_padre = $persona->id_persona;
              return redirect()->route('inscripcion.pasodos', ['idPadre' => $id_padre]);
            }
          }
          else {
              return redirect()->route('padre.index');
          }
        }
        public function saveUserPadre(Request $request)
        {
          $usuario=new User;
          $usuario->name=$request->get('name');
          $usuario->email=$request->get('email');
          $usuario->password=bcrypt('CHS2019');
          $usuario->id_persona=$request->get('id_persona');
          $usuario->save();

          $role = 3;
          $usuario->roles()->attach($role);

          return Redirect::back();

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
          $persona=Persona::findOrFail($id);
          return view('padre.show', compact('persona'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
          $persona=Persona::findOrFail($id);
          return view('padre.edit',compact('persona'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdatePadre $request, $id)
        {
            $persona=Persona::findOrFail($id);
            $persona->nombres=$request->get('nombres');
            $persona->apellidos=$request->get('apellidos');
            $persona->email=$request->get('email');
            $persona->fechanacimiento=$request->get('fechanacimiento');
            $persona->estado_civil=$request->get('estado_civil');
            $persona->nacionalidad=$request->get('nacionalidad');
            $persona->profesion=$request->get('profesion');
            $persona->dpi=$request->get('dpi');
            $persona->direccion=$request->get('direccion');
            $persona->telefono=$request->get('telefono');
            $persona->telefono_dos=$request->get('telefono_dos');
            $persona->celular=$request->get('celular');

            if (Input::hasFile('foto')){
              $file=Input::file('foto');
              $file->move(public_path().'/personas/fotos/',$file->getClientOriginalName());
                $persona->foto=$file->getClientOriginalName();
            }
            $persona->tipo_persona="padre";
            $persona->update();
            return redirect()->route('padre.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {

          $persona = Persona::findOrFail($id);
          $persona->condicion = '0';
          $persona->update();
          return redirect()->route('padre.index');
        }
}
