<?php
namespace CodeMRC\Services;

use CodeMRC\Repositories\ProjectMembersRepository;
use CodeMRC\Validators\ProjectMembersValidator;

class ProjectMembersService extends Service
{
    /**
     * @param ProjectMembersRepository $repository
     * @param ProjectMembersValidator $validator
     */
    public function __construct(ProjectMembersRepository $repository, ProjectMembersValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    public function destroyMember($id, $member)
    {
        $result = $this->findMember($id, $member);
        if( count($result) > 0 )
            return parent::destroy($result[0]->id);
        return "registro não encontrado";
    }

    public function findMember($id, $member)
    {
        return $this->repository->findWhere(['project_id' => $id, 'user_id' => $member]);
    }
}