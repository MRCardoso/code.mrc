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
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $repository;
    /**
     * @var UserValidator
     */
    protected $validator;
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

    public function create(Array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            return $this->repository->create($data);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    public function update(Array $data,$id)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repository->update($data, $id);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
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
        if($this->repository->delete($id))
        {
            $response = [
                "status" => true,
                "message" => "Usuário removido com sucesso"
            ];
        }
        else
        {
            $response = [
                "status" => false,
                "message" => "falha ao remover usuário"
            ];
        }
        return response()->json($response);
    }
}