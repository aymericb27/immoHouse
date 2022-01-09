<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EnergyClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('energy_class')->insert([
            'class' => "A++",
        ]);
        DB::table('energy_class')->insert([
            'class' => "A+",
        ]);
        DB::table('energy_class')->insert([
            'class' => "A",
        ]);
        DB::table('energy_class')->insert([
            'class' => "B",
        ]);
        DB::table('energy_class')->insert([
            'class' => "C",
        ]);
        DB::table('energy_class')->insert([
            'class' => "D",
        ]);
        DB::table('energy_class')->insert([
            'class' => "E",
        ]);
        DB::table('energy_class')->insert([
            'class' => "F",
        ]);
        DB::table('energy_class')->insert([
            'class' => "G",
        ]);
    }
}
