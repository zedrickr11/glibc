<?php

use Illuminate\Database\Seeder;
use App\Jornada;

class JornadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornada')->delete();
        Jornada::create([
          'id_jornada' => "1",
          'nombre' => "Matutina",
          'condicion' => "1"
        ]);
        Jornada::create([
          'id_jornada' => "2",
          'nombre' => "Vespertina",
          'condicion' => "1"
        ]);
        Jornada::create([
          'id_jornada' => "3",
          'nombre' => "Fin de semana",
          'condicion' => "1"
        ]);
    }
}
