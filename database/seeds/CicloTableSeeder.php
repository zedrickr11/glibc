<?php

use Illuminate\Database\Seeder;
use App\Ciclo;
class CicloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ciclo')->delete();
      for ($i=2000; $i<2026 ; $i++) {

        Ciclo::create([
          'nombre' => "Ciclo Escolar {$i}",
          'año' => "{$i}",
          'fecha_inicio' => "{$i}-01-01",
          'fecha_fin' => "{$i}-10-31",
          'condicion' => '1'
        ]);


      }
    }
}
