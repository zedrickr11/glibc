<?php

use Illuminate\Database\Seeder;
use App\Seccion;
class SeccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('seccion')->delete();
      for ($i=1; $i<26 ; $i++) {

        Seccion::create([
          'nombre' => "Sección {$i}",
          'condicion' => "1"

        ]);


      }
    }
}
