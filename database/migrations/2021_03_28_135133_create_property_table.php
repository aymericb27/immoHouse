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
            $table->integer('address_number');
            $table->integer('address_box');
            $table->integer('address_postal_code');
            $table->string('description');
            $table->integer('fk_condition_building')->unsigned();
            $table->integer('living_space');
            $table->integer('nbr_bathroom');
            $table->integer('nbr_facade');
            $table->integer('nbr_floor');
            $table->integer('nbr_toilet');
            $table->integer('price');
            $table->integer('sale_or_rent');
            $table->integer('type_of_property_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('year_construct');
            $table->foreign('type_of_property_id')->references('id')->on('type_of_property');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fk_condition_building')->references('id')->on('condition_building');
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
