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
          'nombre' => "Matutina",
          'condicion' => "1"

        ]);
        Jornada::create([
          'nombre' => "Vespertina",
          'condicion' => "1"

        ]);
        Jornada::create([
          'nombre' => "Fin de semana",
          'condicion' => "1"

        ]);
    }
}
