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
    //  DB::table('persona')->delete();


        Persona::create([
          'nombres' => "Evelyn Yorlandy",
          'apellidos' => "Cárdenas Ruiz",
          'email' => "cardenaschs18@yahoo.es",
          'fechanacimiento' => "1980-12-18",
          'estado_civil' => "Casada",
          'nacionalidad' => "Guatemalteca",
          'profesion' => "Administradora CHS",
          'dpi' => "0",
          'direccion' => "5ta avenida 3-45 zona 2",
          'telefono' => "51283481",
          'telefono_dos' => "",
          'celular' => "",
          'foto' => "persona.png",
          //'usuario',
          //'password',
          'tipo_persona' => "maestro",
          'condicion' => "1"
        ]);
        Persona::create([
          'nombres' => "Fernando Javier",
          'apellidos' => "Reyes Minera",
          'email' => "fernando@gmail.com",
          'fechanacimiento' => "1996-6-3",
          'estado_civil' => "Soltero",
          'nacionalidad' => "Guatemalteco",
          'profesion' => "Administrador del sitio",
          'dpi' => "0",
          'direccion' => "Lomas turbas",
          'telefono' => "47001648",
          'telefono_dos' => "",
          'celular' => "",
          'foto' => "persona.png",
          //'usuario',
          //'password',
          'tipo_persona' => "admin",
          'condicion' => "1"
        ]);
        Persona::create([
          'nombres' => "Zedrick Luis Eddmundo",
          'apellidos' => "Rodríguez Díaz",
          'email' => "zedrickr@gmail.com",
          'fechanacimiento' => "1996-4-6",
          'estado_civil' => "Soltero",
          'nacionalidad' => "Guatemalteco",
          'profesion' => "Administrador del sitio",
          'dpi' => "0",
          'direccion' => "Paseo de la arboleda",
          'telefono' => "41786018",
          'telefono_dos' => "",
          'celular' => "",
          'foto' => "persona.png",
          //'usuario',
          //'password',
          'tipo_persona' => "admin",
          'condicion' => "1"
        ]);



    }
}
