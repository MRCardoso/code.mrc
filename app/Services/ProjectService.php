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
            if(isset($data["due_date"]) && $data["due_date"]=="")
            {
                unset($data["due_date"]);
            }
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch(ValidatorException $e) {
            return $e->getMessageBag();
        }
    }

    public function update(Array $data,$id)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch(ValidatorException $e) {
            return $e->getMessageBag();
        }
    }

    public function destroy($id)
    {
        if($this->repository->delete($id))
        {
            $response = [
                "status" => true,
                "message" => "Projeto removido com sucesso"
            ];
        }
        else
        {
            $response = [
                "status" => false,
                "message" => "falha ao remover Projeto"
            ];
        }
        return response()->json($response);
    }
}