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
        Role::create([

            'name' => "admin",
            'display_name' => "Administrador",
            'description' => "Rol usuarios administradores"

          ]);
          Role::create([

              'name' => "prof",
              'display_name' => "Maestro",
              'description' => "Rol usuarios maestros"

            ]);
            Role::create([

                'name' => "padre",
                'display_name' => "Padre de familia o Encargado",
                'description' => "Rol usuarios padres de familia o encargado"

              ]);
              Role::create([

                  'name' => "director",
                  'display_name' => "Director del colegio",
                  'description' => "Director del colegio"

                ]);
                Role::create([

                    'name' => "secre",
                    'display_name' => "Secretaria del colegio",
                    'description' => "Secretaria del colegio"

                  ]);

    }
}
