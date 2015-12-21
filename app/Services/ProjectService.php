<?php
namespace CodeMRC\Services;

use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService extends Service
{
    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
}