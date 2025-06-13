<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "savinnas",
            'firstName' => "rico",
            'email' => "ricosavinnas@gmail.com",
            'password' => '$2y$12$cHWz6T8ua/4soNLrKd1Tru5DpQJYMnJzKxzsuXSkX.Snf0.55jdze',
        ]);
    }
}
