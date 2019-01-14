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
        Plan::create([
          'nombre' => "Plan 10",
          'cantidad' => "10",
          'condicion' => "1"
        ]);
        Plan::create([
          'nombre' => "Plan 11",
          'cantidad' => "11",
          'condicion' => "1"
        ]);
    }
}
