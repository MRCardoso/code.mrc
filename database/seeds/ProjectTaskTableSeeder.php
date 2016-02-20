<?php

use Illuminate\Database\Seeder;
use CodeMRC\Entities\ProjectTask;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE \"project_task\" CASCADE");
        factory(ProjectTask::class,20)->create();
    }
}
