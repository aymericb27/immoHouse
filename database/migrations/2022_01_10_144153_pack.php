<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->integer('fk_type_pack')->unsigned();
            $table->foreign('fk_type_pack')->references('id')->on('type_pack');
            $table->integer('fk_number_week')->unsigned();
            $table->foreign('fk_number_week', 'fk_nw')->references('id')->on('number_week');
            $table->integer('fk_sell_or_rent')->unsigned();
            $table->foreign('fk_sell_or_rent', 'fk_lor')->references('id')->on('location_or_rent');
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
        Schema::dropIfExists('pack');
    }
}
