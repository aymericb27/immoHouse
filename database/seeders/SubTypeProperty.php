<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SubTypeProperty extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "maison",
            'sub_type_NL' => "huis",
            'sub_type_EN' => "house",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "villa",
            'sub_type_NL' => "villa",
            'sub_type_EN' => "villa",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "bungalow",
            'sub_type_NL' => "bungalow",
            'sub_type_EN' => "bungalow",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "chalet",
            'sub_type_NL' => "chalet",
            'sub_type_EN' => "chalet",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "fermette",
            'sub_type_NL' => "fermette",
            'sub_type_EN' => "cottage",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "château",
            'sub_type_NL' => "kasteel",
            'sub_type_EN' => "mansion",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "maison de maitre",
            'sub_type_NL' => "herenhuis",
            'sub_type_EN' => "master house",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "immeuble mixte",
            'sub_type_NL' => "huis gemengd gebruik",
            'sub_type_EN' => "mixed building",
            'fk_type_property' => 1
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "appartement",
            'sub_type_NL' => "appartement",
            'sub_type_EN' => "flat",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "rez-de-chaussée",
            'sub_type_NL' => "gelijkvloers",
            'sub_type_EN' => "ground floor",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "penthouse",
            'sub_type_NL' => "penthouse",
            'sub_type_EN' => "penthouse",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "duplex",
            'sub_type_NL' => "duplex",
            'sub_type_EN' => "duplex",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "triplex",
            'sub_type_NL' => "triplex",
            'sub_type_EN' => "triplex",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "loft",
            'sub_type_NL' => "loft",
            'sub_type_EN' => "loft",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "studio",
            'sub_type_NL' => "studio",
            'sub_type_EN' => "studio",
            'fk_type_property' => 2
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "terrain",
            'sub_type_NL' => "grond",
            'sub_type_EN' => "land",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "fonds de commerce",
            'sub_type_NL' => "handelsfonds",
            'sub_type_EN' => "business surface",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "surface commerciale",
            'sub_type_NL' => "handelspand",
            'sub_type_EN' => "commerce building",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "ferme",
            'sub_type_NL' => "boerderij",
            'sub_type_EN' => "farming site",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "surface industrielle",
            'sub_type_NL' => "industrie",
            'sub_type_EN' => "industrial building",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "bureaux",
            'sub_type_NL' => "kantoor",
            'sub_type_EN' => "office space",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "garage",
            'sub_type_NL' => "garagebox",
            'sub_type_EN' => "garage",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "parking",
            'sub_type_NL' => "parking",
            'sub_type_EN' => "parking",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "kot",
            'sub_type_NL' => "kot",
            'sub_type_EN' => "student flat",
            'fk_type_property' => 3
        ]);

        DB::table('sub_type_property')->insert([
            'sub_type_FR' => "autre",
            'sub_type_NL' => "ander",
            'sub_type_EN' => "other",
            'fk_type_property' => 3
        ]);
    }
}
