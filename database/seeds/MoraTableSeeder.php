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
        Mora::create([
          'cantidad' => "25",
          'condicion' => "1"
        ]);
    }
}
