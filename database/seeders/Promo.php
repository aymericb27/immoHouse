<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Promo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promo')->insert([
            'code' => "immoflat88",
            'count_max' => 100,
            'promo_pourcent' => 100
        ]);
        DB::table('promo')->insert([
            'code' => "immoflat44",
            'count_max' => 100,
            'promo_pourcent' => 50
        ]);
    }
}
