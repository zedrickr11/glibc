<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests\PersonaFormRequest;
use App\Http\Requests\UpdatePersona;
use App\Persona;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class PersonaController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin');
   }

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
        $roles=Role::all();
        $persona=Persona::all()->where('tipo_persona','maestro')->where('condicion', 1);
        return view ('persona.index',compact('persona','roles'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {

          return view('persona.create');
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
        $persona->tipo_persona="maestro";

        $persona->save();
        return redirect()->route('persona.index');
      }

      public function saveUserMaestro(Request $request)
      {
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt('CHS2019');
        $usuario->id_persona=$request->get('id_persona');
        $usuario->save();

        $role = 2;
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
        return view('persona.show', compact('persona'));
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
        return view('persona.edit',compact('persona'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(UpdatePersona $request, $id)
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
          $persona->tipo_persona="maestro";
          $persona->update();
          return redirect()->route('persona.index');
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
        return redirect()->route('persona.index');
      }
}
