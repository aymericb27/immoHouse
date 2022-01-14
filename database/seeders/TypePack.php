<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypePack extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_pack')->insert([
            'type_FR' => "essentiel",
            'type_NL' => "essentieel",
            'type_EN' => "essential",
        ]);
        DB::table('type_pack')->insert([
            'type_FR' => "standard",
            'type_NL' => "Standaard",
            'type_EN' => "standard",
        ]);
        DB::table('type_pack')->insert([
            'type_FR' => "premium",
            'type_NL' => "premium",
            'type_EN' => "premium",
        ]);
    }
}
