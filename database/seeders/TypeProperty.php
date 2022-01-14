<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeProperty extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_property')->insert([
            'type_FR' => "maison",
            'type_NL' => "huis",
            'type_EN' => "house",
        ]);
        DB::table('type_property')->insert([
            'type_FR' => "appartement",
            'type_NL' => "appartement",
            'type_EN' => "flat",
        ]);
        DB::table('type_property')->insert([
            'type_FR' => "divers",
            'type_NL' => "varia",
            'type_EN' => "miscellaneous",
        ]);
    }
}
