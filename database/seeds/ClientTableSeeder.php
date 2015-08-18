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

        \myProject\models\Client::truncate();

        factory(\myProject\models\Client::class, 5)->create();
    }
}
