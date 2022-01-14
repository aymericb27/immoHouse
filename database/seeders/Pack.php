<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Pack extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pack')->insert([
            'price' => 24.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 1,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 30.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 1,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 34.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 1,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 34.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 2,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 40.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 2,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 44.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 2,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 44.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 3,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 49.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 3,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 54.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 3,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 54.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 4,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 59.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 4,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 64.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 4,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 64.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 5,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 69.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 5,
            "fk_sell_or_rent" => 2,
        ]);

        DB::table('pack')->insert([
            'price' => 74.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 5,
            "fk_sell_or_rent" => 2,
        ]);



        DB::table('pack')->insert([
            'price' => 45.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 1,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 49.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 1,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 54.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 1,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 54.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 2,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 59.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 2,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 64.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 2,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 64.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 3,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 69.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 3,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 74.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 3,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 74.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 4,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 79.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 4,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 84.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 4,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 84.99,
            'fk_type_pack' => 1,
            'fk_number_week' => 5,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 89.99,
            'fk_type_pack' => 2,
            'fk_number_week' => 5,
            "fk_sell_or_rent" => 1,
        ]);

        DB::table('pack')->insert([
            'price' => 95.99,
            'fk_type_pack' => 3,
            'fk_number_week' => 5,
            "fk_sell_or_rent" => 1,
        ]);
    }
}
