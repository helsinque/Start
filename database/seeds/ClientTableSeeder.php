<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \myProject\Client::truncate();

        factory(\myProject\Client::class, 5)->create();
    }
}
