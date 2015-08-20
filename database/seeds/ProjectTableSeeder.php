<?php

use Illuminate\Database\Seeder;
use CodeMRC\Entities\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE \"user\" CASCADE");
        DB::statement("TRUNCATE TABLE \"client\" CASCADE");
        Project::truncate();
        factory(Project::class,5)->create();
    }
}
