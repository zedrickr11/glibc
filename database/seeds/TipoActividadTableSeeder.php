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
      for ($i=1; $i<26 ; $i++) {

        TipoActividad::create([
          'nombre' => "Actividad {$i}"


        ]);


      }
    }
}
