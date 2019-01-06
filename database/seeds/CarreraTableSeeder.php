<?php

use Illuminate\Database\Seeder;
use App\Carrera;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrera')->delete();
        Carrera::create([
          'nombre' => "Pre-primaria",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Primaria",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Básico",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Bachillerato en Medicina",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Bachillerato en Enfermería",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Bachillerato en Ciencias Jurídicas",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Bachillerato en Computación",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
        Carrera::create([
          'nombre' => "Perito Contador",
          'condicion' => "1",
          'id_jornada' => "1"
        ]);
    }
}
