<?php

namespace CodeMRC\Services;

use CodeMRC\Entities\Project;
use CodeMRC\Repositories\ClientRepository;
use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ClientValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ClientValidator
     */
    protected $validator;
    /**
     * @var
     */
    protected $projectRepository;
    /**
     * @param ClientRepository $repository
     * @param ClientValidator $validator
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator, ProjectRepository $projectRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->projectRepository = $projectRepository;
    }

    public function create(Array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            return $this->repository->create($data);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    public function update(Array $data,$id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repository->update($data, $id);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    public function destroy($id)
    {
        $projects = $this->projectRepository->findWhere(['client_id' => $id]);
        if(count($projects)>0)
        {
            $list = [];
            foreach($projects as $project)
            {
                array_push($list,$project->description);
            }
            return response()->json([
                "status" => false,
                "message" => "Este cliente não pode ser deletado pois ele encotra-se nos seguntes projetos: ".implode(',',$list)
            ]);
        }
        if($this->repository->delete($id))
        {
            $response = [
                "status" => true,
                "message" => "Cliente removido com sucesso"
            ];
        }
        else
        {
            $response = [
                "status" => false,
                "message" => "falha ao remover cliente"
            ];
        }
        return response()->json($response);
    }
}