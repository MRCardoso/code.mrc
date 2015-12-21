<?php
namespace CodeMRC\Repositories;

use CodeMRC\Entities\Project;

class ProjectRepositoryEloquent extends Repository implements ProjectRepository
{
    protected $_model = Project::class;
}