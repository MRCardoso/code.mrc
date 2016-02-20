<?php

namespace CodeMRC\Services;

use CodeMRC\Repositories\ClientRepository;
use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ClientValidator;

class ClientService extends Service
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;
    /**
     * @param ClientRepository $repository
     * @param ClientValidator $validator
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator, ProjectRepository $projectRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->projectRepository = $projectRepository;
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
        return parent::destroy($id);
    }
}