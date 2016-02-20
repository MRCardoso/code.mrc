<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 16/08/15
 * Time: 19:16
 */

namespace CodeMRC\Services;


use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Repositories\UserRepository;
use CodeMRC\Validators\UserValidator;

class UserService extends Service
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;
    /**
     * @param UserRepository $repository
     * @param UserValidator $validator
     * @param ProjectRepository $projectRepository
     */
    public function __construct(UserRepository $repository, UserValidator $validator,ProjectRepository $projectRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->projectRepository = $projectRepository;
    }

    public function destroy($id)
    {
        $projects = $this->projectRepository->findWhere(['owner_id' => $id]);
        if(count($projects)>0)
        {
            $list = [];
            foreach($projects as $project)
            {
                array_push($list,$project->description);
            }
            return response()->json([
                "status" => false,
                "message" => "Este usuário não pode ser deletado pois ele encotra-se nos seguntes projetos: ".implode(',',$list)
            ]);
        }
        return parent::destroy($id);
    }
}