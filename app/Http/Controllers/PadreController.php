<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonaFormRequest;
use App\Persona;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class PadreController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
   }


        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
          $persona=Persona::all()->where('tipo_persona','padre');
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
          return redirect()->route('padre.index');
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
        public function update(PersonaFormRequest $request, $id)
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
