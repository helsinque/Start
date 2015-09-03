<?php

/**
 * Created by PhpStorm.
 * User: hel-sys
 * Date: 26-08-2015
 * Time: 22:20
 */


use \Illuminate\Database\Seeder;

class UsersTableSeeder extends  Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //\myProject\Entities\Project::truncate();

        factory(\myProject\Entities\User::class, 10)->create();
    }

}