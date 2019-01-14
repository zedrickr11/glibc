<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class UnidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad')->delete();
        Unidad::create([
          'nombre' => "Primera Unidad",
          'condicion' => "1"
        ]);
        Unidad::create([
          'nombre' => "Segunda Unidad",
          'condicion' => "1"
        ]);
        Unidad::create([
          'nombre' => "Tercera Unidad",
          'condicion' => "1"
        ]);
        Unidad::create([
          'nombre' => "Cuarta Unidad",
          'condicion' => "1"
        ]);
        Unidad::create([
          'nombre' => "Quinta Unidad",
          'condicion' => "1"
        ]);
    }
}
