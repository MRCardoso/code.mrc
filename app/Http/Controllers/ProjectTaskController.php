<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Repositories\ProjectTaskRepository;
use CodeMRC\Services\ProjectTaskService;
use Illuminate\Http\Request;

class ProjectTaskController extends MainController
{
    protected $_controller_name = 'project_task';

    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskService $service
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    public function tasks($projectId)
    {
        return $this->repository->findWhere(['project_id'=>$projectId]);
    }
    public function storeTask(Request $request,$projectId)
    {
        return $this->service->createTask($projectId, $request->all());
    }
    public function showTask($projectId, $id)
    {
        return $this->repository->findWhere(['project_id' => $projectId, 'id' => $id]);
    }
    public function updateTask(Request $request, $projectId, $id)
    {
        return $this->service->updateTask($request->all(), $projectId, $id);
    }
    public function destroyTask($projectId, $id)
    {
        return $this->service->destroyTask($projectId, $id);
    }
}
