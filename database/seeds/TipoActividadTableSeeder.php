<?php

use Illuminate\Database\Seeder;
use App\TipoActividad;
class TipoActividadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipo_actividad')->delete();


        TipoActividad::create([
          'nombre' => "Procedimentales",
          'condicion' => "1"
        ]);
        TipoActividad::create([
          'nombre' => "Actitudinales",
          'condicion' => "1"
        ]);
        TipoActividad::create([
          'nombre' => "Declarativos",
          'condicion' => "1"
        ]);

    }
}
