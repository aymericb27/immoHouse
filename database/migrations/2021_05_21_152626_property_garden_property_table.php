<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyGardenPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_garden_property', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_property')->unsigned();
            $table->foreign('fk_property')->references('id')->on('property');
            $table->integer('fk_property_garden')->unsigned();
            $table->foreign('fk_property_garden', 'fk_pg')->references('id')->on('property_garden');
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
        Schema::dropIfExists('property_garden_property');
    }
}
