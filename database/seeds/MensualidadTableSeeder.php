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
        Mensualidad::create(['id_mensualidad' => "1", 'nombre' => "Enero", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "2", 'nombre' => "Febrero", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "3", 'nombre' => "Marzo", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "4", 'nombre' => "Abril", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "5", 'nombre' => "Mayo", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "6", 'nombre' => "Junio", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "7", 'nombre' => "Julio", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "8", 'nombre' => "Agosto", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "9", 'nombre' => "Septiembre", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "10", 'nombre' => "Octubre", 'dia_limite' => "5" ,'condicion' => "1"]);
        Mensualidad::create(['id_mensualidad' => "11", 'nombre' => "Noviembre", 'dia_limite' => "5" ,'condicion' => "1"]);
        //Mensualidad::create(['id_mensualidad' => "12", 'nombre' => "Diciembre", 'dia_limite' => "5" ,'condicion' => "1"]);
    }
}
