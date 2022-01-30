<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->integer('address_box')->nullable();
            $table->string('address_street');
            $table->integer('address_number')->nullable();
            $table->integer('address_postal_code');
            $table->string('address_town');
            $table->integer('cadastral_income')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone_number',20)->nullable();
            $table->text('description_FR')->nullable();
            $table->text('description_NL')->nullable();
            $table->text('description_EN')->nullable();
            $table->integer('fk_energy_class')->unsigned()->nullable();
            $table->integer('fk_province')->unsigned()->nullable();
            $table->integer('fk_sell_or_rent')->unsigned();
            $table->integer('fk_sub_type_property')->unsigned();
            $table->integer('fk_users')->unsigned();
            $table->integer('has_garden');
            $table->integer('has_swimming_pool');
            $table->integer('has_terrace');
            $table->integer('is_online');
            $table->integer('is_visible');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->integer('monthly_costs')->nullable();
            $table->integer('nbr_bathroom')->nullable();
            $table->integer('nbr_bedroom')->nullable();
            $table->integer('nbr_room')->nullable();
            $table->integer('nbr_toilet')->nullable();
            $table->integer('price');
            $table->integer('price_square_meter')->nullable();
            $table->integer('total_area')->nullable();
            $table->integer('year_construct')->nullable();
            $table->foreign('fk_energy_class')->references('id')->on('energy_class');
            $table->foreign('fk_province')->references('id')->on('province');
            $table->foreign('fk_sell_or_rent')->references('id')->on('sell_or_rent');
            $table->foreign('fk_sub_type_property')->references('id')->on('sub_type_property');
            $table->foreign('fk_users')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}
