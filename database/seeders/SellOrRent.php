<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SellOrRent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sell_or_rent')->insert([
            'type' => "to sell",
        ]);
        DB::table('sell_or_rent')->insert([
            'type' => "to rent",
        ]);
    }
}
