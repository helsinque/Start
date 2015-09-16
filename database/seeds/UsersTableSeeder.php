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
        factory(\myProject\Entities\User::class)->create(

            array('name' => 'helsinque',
                  'email' => 'helsinquedeveloper@gmail.com',
                  'password' => bcrypt(12345),
                  'remember_token' => str_random(10)
                 )

        );
        factory(\myProject\Entities\User::class, 10)->create();
    }

}