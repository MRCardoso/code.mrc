<?php

namespace CodeMRC\Services;

use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectValidator
     */
    protected $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(Array $data)
    {
        try{
            if($data["due_date"]=="") unset($data["due_date"]);
            $this->validator->with($data)->passesOrFail();
            $this->repository->create($data);
            return redirect('project');
        } catch(ValidatorException $e) {
            return redirect('project/create')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

    public function update(Array $data,$id)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            $this->repository->update($data, $id);
            return redirect('project');
        } catch(ValidatorException $e) {
            return redirect('project/create')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}