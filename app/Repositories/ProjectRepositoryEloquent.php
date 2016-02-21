<?php
namespace CodeMRC\Repositories;

use CodeMRC\Entities\Project;
use CodeMRC\Presenters\ProjectPresenter;

class ProjectRepositoryEloquent extends Repository implements ProjectRepository
{
    protected $_model = Project::class;

    protected $_modelPresenter = ProjectPresenter::class;

    public function isOwner($projectId, $userId)
    {
        $result = $this->findWhere([
            'id' => $projectId,
            'owner_id' => $userId
        ]);
        if( count($result) > 0 )
            return true;

        return false;
    }
}