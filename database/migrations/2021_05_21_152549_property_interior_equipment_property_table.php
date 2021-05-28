<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyInteriorEquipmentPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_interior_equipment_property', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_property')->unsigned();
            $table->foreign('fk_property')->references('id')->on('property');
            $table->integer('fk_property_interior_equipment')->unsigned();
            $table->foreign('fk_property_interior_equipment','fk_pie')->references('id')->on('property_interior_equipment');
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
        Schema::dropIfExists('property_interior_equipment_property');
    }
}
