<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class propertyPicture extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // n°1 property
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 1,
            'is_main_picture' => 1,
            'fk_property' => 1,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 2,
            'is_main_picture' => 0,
            'fk_property' => 1,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 3,
            'is_main_picture' => 0,
            'fk_property' => 1,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 4,
            'is_main_picture' => 0,
            'fk_property' => 1,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 5,
            'is_main_picture' => 0,
            'fk_property' => 1,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 6,
            'is_main_picture' => 0,
            'fk_property' => 1,
        ]);

        
        // n°2 property
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 1,
            'is_main_picture' => 1,
            'fk_property' => 2,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 2,
            'is_main_picture' => 0,
            'fk_property' => 2,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 3,
            'is_main_picture' => 0,
            'fk_property' => 2,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 4,
            'is_main_picture' => 0,
            'fk_property' => 2,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 5,
            'is_main_picture' => 0,
            'fk_property' => 2,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 6,
            'is_main_picture' => 0,
            'fk_property' => 2,
        ]);

        // n°3 property
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 1,
            'is_main_picture' => 1,
            'fk_property' => 3,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 2,
            'is_main_picture' => 0,
            'fk_property' => 3,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 3,
            'is_main_picture' => 0,
            'fk_property' => 3,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 4,
            'is_main_picture' => 0,
            'fk_property' => 3,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 5,
            'is_main_picture' => 0,
            'fk_property' => 3,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 6,
            'is_main_picture' => 0,
            'fk_property' => 3,
        ]);


        // n°4 property
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 1,
            'is_main_picture' => 1,
            'fk_property' => 4,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 2,
            'is_main_picture' => 0,
            'fk_property' => 4,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 3,
            'is_main_picture' => 0,
            'fk_property' => 4,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 4,
            'is_main_picture' => 0,
            'fk_property' => 4,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 5,
            'is_main_picture' => 0,
            'fk_property' => 4,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 6,
            'is_main_picture' => 0,
            'fk_property' => 4,
        ]);

        // n°5 property
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 1,
            'is_main_picture' => 1,
            'fk_property' => 5,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 2,
            'is_main_picture' => 0,
            'fk_property' => 5,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 3,
            'is_main_picture' => 0,
            'fk_property' => 5,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 4,
            'is_main_picture' => 0,
            'fk_property' => 5,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 5,
            'is_main_picture' => 0,
            'fk_property' => 5,
        ]);
        DB::table('property_picture')->insert([
            'extension' => "jpg",
            'order' => 6,
            'is_main_picture' => 0,
            'fk_property' => 5,
        ]);
    }
}
