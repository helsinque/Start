<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \myProject\Entities\Project::truncate();

        factory(\myProject\Entities\Project::class, 5)->create();
    }
}
