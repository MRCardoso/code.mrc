<?php
namespace CodeMRC\Services;


use CodeMRC\Repositories\ProjectTaskRepository;
use CodeMRC\Validators\ProjectTaskValidator;

class ProjectTaskService extends Service
{
    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskValidator $validator
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
}