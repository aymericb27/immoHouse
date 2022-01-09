<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyHeatingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_heating_type', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_heating_type')->unsigned();
            $table->foreign('fk_heating_type')->references('id')->on('heating_type');
            $table->integer('fk_property')->unsigned();
            $table->foreign('fk_property','fk_prop')->references('id')->on('property');
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
        Schema::dropIfExists('property_heating_type');
    }
}
