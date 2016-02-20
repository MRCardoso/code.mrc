<?php

namespace CodeMRC\Repositories;
use CodeMRC\Entities\ProjectTask;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace CodeMRC\Repositories;
 */
class ProjectTaskRepositoryEloquent extends Repository implements ProjectTaskRepository
{
    protected $_model = ProjectTask::class;
}
