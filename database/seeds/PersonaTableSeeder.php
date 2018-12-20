<?php

use Illuminate\Database\Seeder;
use App\Persona;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('persona')->delete();
      for ($i=1; $i<26 ; $i++) {

        Persona::create([
          'nombres' => "Persona {$i}",
          'apellidos' => "Apellidos {$i}",
          'email' => "persona{$i}@gmail.com",
          'fechanacimiento' => "2018/01/{$i}",
          'estado_civil' => "Soltero",
          'nacionalidad' => "Guatemalteco",
          'profesion' => "Profesion {$i}",
          'dpi' => "2977843580710",
          'direccion' => "Panajachel, Sololá",
          'telefono' => "41786018",
          'telefono_dos' => "77620769",
          'celular' => "41856652",
          'foto' => "persona.png",
          'usuario',
          'password',
          'tipo_persona' => "maestro"
        ]);


      }
    }
}
