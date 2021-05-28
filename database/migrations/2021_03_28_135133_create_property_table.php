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
            $table->string('address');
            $table->integer('address_town');
            $table->integer('address_number');
            $table->integer('address_box');
            $table->integer('address_postal_code');
            $table->string('description')->nullable();
            $table->integer('fk_condition_building')->unsigned();
            $table->integer('fk_energy_class')->unsigned();
            $table->integer('fk_type_of_property')->unsigned();
            $table->integer('fk_user')->unsigned();
            $table->integer('living_space')->nullable();
            $table->integer('is_online');
            $table->integer('kitchen_area')->nullable();
            $table->integer('nbr_bathroom')->nullable();
            $table->integer('nbr_facade')->nullable();
            $table->integer('nbr_floor')->nullable();
            $table->integer('nbr_toilet')->nullable();
            $table->integer('nbr_room')->nullable();
            $table->integer('nbr_bedroom')->nullable();
            $table->integer('price');
            $table->integer('sale_or_rent');
            $table->integer('total_area')->nullable();
            $table->integer('year_construct')->nullable();
            $table->foreign('fk_condition_building')->references('id')->on('condition_building');
            $table->foreign('fk_energy_class')->references('id')->on('energy_class');
            $table->foreign('fk_type_of_property')->references('id')->on('type_of_property');
            $table->foreign('fk_user')->references('id')->on('users');
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
