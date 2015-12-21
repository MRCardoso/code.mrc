<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Repositories\ProjectTaskRepository;
use CodeMRC\Services\ProjectTaskService;

class ProjectTaskController extends MainController
{
    protected $_controller_name = 'project_task';

    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskService $service
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
}
