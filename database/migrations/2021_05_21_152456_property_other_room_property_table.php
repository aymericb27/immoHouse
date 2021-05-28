<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyOtherRoomPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_other_room_property', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_property')->unsigned();
            $table->foreign('fk_property')->references('id')->on('property');
            $table->integer('fk_property_other_room')->unsigned();
            $table->foreign('fk_property_other_room','fk_por')->references('id')->on('property_other_room');
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
        Schema::dropIfExists('property_other_room_property');
    }
}
