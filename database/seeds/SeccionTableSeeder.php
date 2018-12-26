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
      Seccion::create([
        'nombre' => "A",
        'condicion' => "1"
      ]);
      Seccion::create([
        'nombre' => "B",
        'condicion' => "1"
      ]);
      Seccion::create([
        'nombre' => "C",
        'condicion' => "1"
      ]);
    }
}
