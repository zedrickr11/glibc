<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(CursoTableSeeder::class);
        //$this->call(CicloTableSeeder::class);
        $this->call(SeccionTableSeeder::class);
        $this->call(TipoActividadTableSeeder::class);
        $this->call(MoraTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(PersonaTableSeeder::class);
        $this->call(JornadaTableSeeder::class);
        $this->call(CarreraTableSeeder::class);
        $this->call(UnidadTableSeeder::class);
        $this->call(MensualidadTableSeeder::class);
        $this->call(RolTableSeeder::class);
    }
}
