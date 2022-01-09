<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HeatingType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heating_type')->insert([
            'heating_type_FR' => "charbon",
            'heating_type_NL' => "steenkool",
            'heating_type_EN' => "carbon",
        ]);
        DB::table('heating_type')->insert([
            'heating_type_FR' => "électrique",
            'heating_type_NL' => "elektrisch",
            'heating_type_EN' => "electric",
        ]);
        DB::table('heating_type')->insert([
            'heating_type_FR' => "gaz",
            'heating_type_NL' => "gas",
            'heating_type_EN' => "gas",
        ]);
        DB::table('heating_type')->insert([
            'heating_type_FR' => "mazout",
            'heating_type_NL' => "stookolie",
            'heating_type_EN' => "fuel oil",
        ]);
        DB::table('heating_type')->insert([
            'heating_type_FR' => "bois",
            'heating_type_NL' => "hout",
            'heating_type_EN' => "wood",
        ]);
        DB::table('heating_type')->insert([
            'heating_type_FR' => "pellets",
            'heating_type_NL' => "pellets",
            'heating_type_EN' => "pellet",
        ]);
        DB::table('heating_type')->insert([
            'heating_type_FR' => "solaire",
            'heating_type_NL' => "zonne",
            'heating_type_EN' => "solar",
        ]);
    }
}
