<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class property extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property')->insert([
            'address_street' => "rue de léau",
            'address_town' => "hélécine",
            'contact_email' => "aymeric@gmail.com",
            'fk_sell_or_rent' => 1,
            'fk_sub_type_property' => 1,
            'fk_users' => 1,
            'nbr_bedroom' => 3,
            'nbr_bathroom' => 2,
            'nbr_room' => 1,
            'nbr_toilet' => 1,
            'total_area' => 350,
            'has_garden' => 1,
            'has_swimming_pool' => 1,
            'has_terrace' => 1,
            'is_online' => 1,
            'is_visible' => 1,
            'fk_energy_class' => 1,
            'price' => 200000,
            'address_postal_code' => 1341
        ]);
        DB::table('property')->insert([
            'address_street' => "rue de léau",
            'address_town' => "hélécine",
            'contact_email' => "aymeric@gmail.com",
            'fk_sell_or_rent' => 1,
            'fk_sub_type_property' => 2,
            'fk_users' => 1,
            'nbr_bedroom' => 2,
            'total_area' => 800,
            'has_garden' => 0,
            'has_swimming_pool' => 0,
            'has_terrace' => 0,
            'is_online' => 1,
            'is_visible' => 1,
            'fk_energy_class' => 2,
            'price' => 230000,
            'address_postal_code' => 1357
        ]);
        DB::table('property')->insert([
            'address_street' => "rue de léau",
            'address_town' => "hélécine",
            'contact_email' => "aymeric@gmail.com",
            'fk_sell_or_rent' => 1,
            'fk_sub_type_property' => 1,
            'fk_users' => 1,
            'nbr_bedroom' => 4,
            'total_area' => 420,
            'has_garden' => 0,
            'has_swimming_pool' => 0,
            'has_terrace' => 0,
            'is_online' => 1,
            'is_visible' => 1,
            'fk_energy_class' => 5,
            'price' => 150000,
            'address_postal_code' => 4231
        ]);
        DB::table('property')->insert([
            'address_street' => "rue de léau",
            'address_town' => "hélécine",
            'contact_email' => "aymeric@gmail.com",
            'fk_sell_or_rent' => 2,
            'fk_sub_type_property' => 1,
            'fk_users' => 1,
            'nbr_bedroom' => 3,
            'total_area' => 400,
            'has_garden' => 0,
            'has_swimming_pool' => 0,
            'has_terrace' => 0,
            'is_online' => 1,
            'is_visible' => 1,
            'fk_energy_class' => 4,
            'price' => 300000,
            'address_postal_code' => 4231
        ]);
        DB::table('property')->insert([
            'address_street' => "rue de léau",
            'address_town' => "hélécine",
            'contact_email' => "aymeric@gmail.com",
            'fk_sell_or_rent' => 2,
            'fk_sub_type_property' => 1,
            'fk_users' => 1,
            'nbr_bedroom' => 2,
            'total_area' => 300,
            'has_garden' => 0,
            'has_swimming_pool' => 0,
            'has_terrace' => 0,
            'is_online' => 1,
            'is_visible' => 1,
            'fk_energy_class' => 3,
            'price' => 180000,
            'address_postal_code' => 1357
        ]);
    }
}
