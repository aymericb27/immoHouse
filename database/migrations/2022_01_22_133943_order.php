<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('id_stripe')->nullable();
            $table->integer('is_active');
            $table->integer('fk_users_promo')->unsigned()->nullable();
            $table->foreign('fk_users_promo')->references('id')->on('users_promo');
            $table->integer('fk_property')->unsigned();
            $table->foreign('fk_property')->references('id')->on('property');
            $table->integer('fk_pack')->unsigned();
            $table->foreign('fk_pack','fk_pck')->references('id')->on('pack');
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
        Schema::dropIfExists('order');

    }
}
