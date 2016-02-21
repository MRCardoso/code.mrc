<?php
namespace CodeMRC\Repositories;

use CodeMRC\Entities\ProjectMembers;
use CodeMRC\Presenters\ProjectMembersPresenter;

class ProjectMembersRepositoryEloquent extends Repository implements ProjectMembersRepository
{
    protected $_model = ProjectMembers::class;

    protected $_modelPresenter = ProjectMembersPresenter::class;

    public function findMember($id, $member)
    {
        return $this->findWhere(['project_id' => $id, 'user_id' => $member]);
    }
}