<?php

use Illuminate\Database\Seeder;
use App\Mora;
class MoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('mora')->delete();
      for ($i=1; $i<26 ; $i++) {

        Mora::create([
          'cantidad' => "10{$i}",
          'condicion' => "1"


        ]);


      }
    }
}
