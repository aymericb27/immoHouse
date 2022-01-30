<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersPropertyFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_property_favorites', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_property')->unsigned();
            $table->foreign('fk_property')->references('id')->on('property');
            $table->integer('fk_users')->unsigned();
            $table->foreign('fk_users','fk_usrs')->references('id')->on('users');
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
        Schema::dropIfExists('users_property_favorites');
    }
}
