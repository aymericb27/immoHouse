<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Province extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->insert([
            'name_FR' => "brabant wallon",
            'name_EN' => "walloon brabant",
            'name_NL' => "Waals-Brabant",
            'short_name' => 'BW',
        ]);

        DB::table('province')->insert([
            'name_FR' => "namur",
            'name_EN' => "namur",
            'name_NL' => "namen",
            'short_name' => 'NA',
        ]);


        DB::table('province')->insert([
            'name_FR' => "bruxelle",
            'name_EN' => "brussels",
            'name_NL' => "brussel",
            'short_name' => 'BXL',
        ]);

        DB::table('province')->insert([
            'name_FR' => "liège",
            'name_EN' => "liège",
            'name_NL' => "luik",
            'short_name' => 'LG',
        ]);

        DB::table('province')->insert([
            'name_FR' => "luxembourg",
            'name_EN' => "luxembourg",
            'name_NL' => "luxemburg",
            'short_name' => 'LX',
        ]);


        DB::table('province')->insert([
            'name_FR' => "hainaut",
            'name_EN' => "hainaut",
            'name_NL' => "henegouwen",
            'short_name' => 'HT',
        ]);


        DB::table('province')->insert([
            'name_FR' => "limbourg",
            'name_EN' => "limburg",
            'name_NL' => "limburg",
            'short_name' => 'LI',
        ]);


        DB::table('province')->insert([
            'name_FR' => "brabant flamand",
            'name_EN' => "flemish brabant",
            'name_NL' => "vlaams-Brabant",
            'short_name' => 'NA',
        ]);


        DB::table('province')->insert([
            'name_FR' => "anvers",
            'name_EN' => "antwerp",
            'name_NL' => "antwerpen",
            'short_name' => 'AN',
        ]);


        DB::table('province')->insert([
            'name_FR' => "flandre orientale",
            'name_EN' => "east flanders",
            'name_NL' => "oost-Vlanderen",
            'short_name' => 'OV',
        ]);


        DB::table('province')->insert([
            'name_FR' => "flandre occidentale",
            'name_EN' => "namur",
            'name_NL' => "west-Vlanderen",
            'short_name' => 'WV',
        ]);
    }
}
