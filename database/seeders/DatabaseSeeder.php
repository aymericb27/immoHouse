<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PropertyOtherRoomSeeder::class,
            EnergyClass::class,
            HeatingType::class,
            SellOrRent::class,
            NumberWeek::class,
            TypePack::class,
            Pack::class,
            TypeProperty::class,
            SubTypeProperty::class,
            Province::class,
            Promo::class,
            User::class,
            Property::class,
            PropertyPicture::class,
            Order::class,
        ]);
    }
}
