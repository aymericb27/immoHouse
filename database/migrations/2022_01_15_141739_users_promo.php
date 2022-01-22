<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersPromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_promo', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_users')->unsigned();
            $table->foreign('fk_users')->references('id')->on('users');
            $table->integer('fk_promo')->unsigned();
            $table->foreign('fk_promo','fk_pro')->references('id')->on('promo');
            $table->integer('count_promo');
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
        Schema::dropIfExists('users_promo');
    }
}
