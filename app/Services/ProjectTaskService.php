<?php
namespace CodeMRC\Services;


use CodeMRC\Repositories\ProjectTaskRepository;
use CodeMRC\Validators\ProjectTaskValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

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
    public function createTask($projectId, Array $data)
    {
        try{
            $data["project_id"] = $projectId;
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->validateField($this->repository->attributes(), $data);
            return $this->repository->create($data);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }
    public function updateTask(Array $data, $projectId, $id)
    {
        $task = $this->repository->findWhere(['project_id' => $projectId, 'id' => $id]);

        if( count($task) > 0 )
        {
            try{
                $data["project_id"] = $projectId;
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $this->validateField($this->repository->attributes(), $data);
                return $this->repository->update($data, $id);
            } catch(ValidatorException $e){
                return $e->getMessageBag();
            }
        }
        else
        {
            return response()->json(['status' => 'error', 'message' => 'this task not bolongs to this project.']);
        }
    }

    public function destroyTask($projectId, $id)
    {
        $task = $this->repository->findWhere(['project_id' => $projectId, 'id' => $id]);

        if($task[0]->delete($id))
        {
            $response = [
                "status" => true,
                "message" => "Registro removido com sucesso"
            ];
        }
        else
        {
            $response = [
                "status" => false,
                "message" => "falha ao remover Registro"
            ];
        }
        return response()->json($response);
    }
}