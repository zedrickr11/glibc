<?php

use Illuminate\Database\Seeder;
use App\Curso;
class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('curso')->delete();
      for ($i=1; $i<26 ; $i++) {

        Curso::create([
          'nombre' => "Curso {$i}",
          'descripcion' => "Cursos de prueba",
          'condicion' => '1'
        ]);


      }
    }
}
