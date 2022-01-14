<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NumberWeek extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('number_week')->insert([
            'week' => 2,
        ]);
        DB::table('number_week')->insert([
            'week' => 4,
        ]);
        DB::table('number_week')->insert([
            'week' => 8,
        ]);
        DB::table('number_week')->insert([
            'week' => 12,
        ]);
        DB::table('number_week')->insert([
            'week' => 16,
        ]);
    }
}
