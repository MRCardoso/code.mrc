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
        DB::statement("TRUNCATE TABLE \"project\" CASCADE");
        factory(Project::class,20)->create();
    }
}
