<?php

use Illuminate\Database\Seeder;
use App\Mensualidad;

class MensualidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensualidad')->delete();
        Mensualidad::create(['nombre' => "Enero", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Febrero", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Marzo", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Abril", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Mayo", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Junio", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Julio", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Agosto", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Septiembre", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Octubre", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Noviembre", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['nombre' => "Diciembre", 'dia_limite' => "5" ,'condicion' => "1"]);
    }
}
