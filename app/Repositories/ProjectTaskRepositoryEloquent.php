<?php

namespace CodeMRC\Repositories;
use CodeMRC\Entities\ProjectTask;
use CodeMRC\Presenters\ProjectTaskPresenter;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace CodeMRC\Repositories;
 */
class ProjectTaskRepositoryEloquent extends Repository implements ProjectTaskRepository
{
    protected $_model = ProjectTask::class;
    
    protected $_modelPresenter = ProjectTaskPresenter::class;
}
