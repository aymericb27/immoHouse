<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubTypeProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_type_property', function (Blueprint $table) {
            $table->id();
            $table->string('sub_type_FR');
            $table->string('sub_type_NL');
            $table->string('sub_type_EN');
            $table->integer('fk_type_property')->unsigned();
            $table->foreign('fk_type_property')->references('id')->on('type_property');
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
        Schema::dropIfExists('sub_type_property');
    }
}
