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
      for ($i=2018; $i<2020 ; $i++) {

        Ciclo::create([
          'nombre' => "Ciclo Escolar {$i}",
          'año' => "{$i}",
          'fecha_inicio' => "07-01-{$i}",
          'fecha_fin' => "30-10-{$i}",
          'condicion' => '1'
        ]);
      }
    }
}
