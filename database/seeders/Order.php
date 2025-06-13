<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'is_active' => 1,
            'fk_property' => 1,
            'fk_pack' => 3,
        ]);
        DB::table('order')->insert([
            'is_active' => 1,
            'fk_property' => 2,
            'fk_pack' => 3,
        ]);
        DB::table('order')->insert([
            'is_active' => 1,
            'fk_property' => 3,
            'fk_pack' => 3,
        ]);
        DB::table('order')->insert([
            'is_active' => 1,
            'fk_property' => 4,
            'fk_pack' => 3,
        ]);
        DB::table('order')->insert([
            'is_active' => 1,
            'fk_property' => 5,
            'fk_pack' => 3,
        ]);
    }
}
