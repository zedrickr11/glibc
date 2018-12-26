<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->delete();
        Rol::create(['nombre' => "Administrador", 'descripcion' => "Rol usuarios administradores" ,'condicion' => "1"]);
        Rol::create(['nombre' => "Maestro", 'descripcion' => "Rol usuarios maestros" ,'condicion' => "1"]);
        Rol::create(['nombre' => "Padre", 'descripcion' => "Rol usuarios padres de familia" ,'condicion' => "1"]);
    }
}
