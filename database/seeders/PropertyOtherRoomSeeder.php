<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyOtherRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_other_room')->insert([
            'room_FR' => "salon",
            'room_NL' => "woonkamer",
            'room_EN' => "living room",
        ]);
        DB::table('property_other_room')->insert([
            'room_FR' => "salle à manger",
            'room_NL' => "eetkamer",
            'room_EN' => "dining room",
        ]);
        DB::table('property_other_room')->insert([
            'room_FR' => "cave",
            'room_NL' => "kelder",
            'room_EN' => "cellar",
        ]);
        DB::table('property_other_room')->insert([
            'room_FR' => "buanderie",
            'room_NL' => "bergruimte",
            'room_EN' => "utility room",
        ]);
        DB::table('property_other_room')->insert([
            'room_FR' => "grenier",
            'room_NL' => "zolder",
            'room_EN' => "attic",
        ]);
        DB::table('property_other_room')->insert([
            'room_FR' => "bureau",
            'room_NL' => "kantoor",
            'room_EN' => "office",
        ]);
        DB::table('property_other_room')->insert([
            'room_FR' => "espace de travail",
            'room_NL' => "werkruimte",
            'room_EN' => "workspace",
        ]);
    }
}
