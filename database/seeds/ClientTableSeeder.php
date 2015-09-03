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

       // \myProject\Entities\Client::truncate();

        factory(\myProject\Entities\Client::class, 10)->create();
    }
}
