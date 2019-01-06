<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        Rol::create(['nombre' => "Administrador", 'descripcion' => "Rol usuarios administradores" ,'display_name' => "admin"]);
        Rol::create(['nombre' => "Maestro", 'descripcion' => "Rol usuarios maestros" ,'display_name' => "prof"]);
        Rol::create(['nombre' => "Padre", 'descripcion' => "Rol usuarios padres de familia" ,'display_name' => "padre"]);
    }
}
