<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('plan')->delete();
      for ($i=1; $i<26 ; $i++) {

        Plan::create([
          'nombre' => "Plan {$i}",
          'cantidad' => "{$i}",
          'condicion' => "1"

        ]);


      }
    }
}
