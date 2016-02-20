<?php

use Illuminate\Database\Seeder;
use CodeMRC\Entities\ProjectMembers;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE \"project_members\" CASCADE");
        factory(ProjectMembers::class,20)->create();
    }
}
