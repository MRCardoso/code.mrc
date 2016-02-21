<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Repositories\ProjectFileRepository;
use CodeMRC\Services\ProjectFileService;
use Illuminate\Http\Request;

use CodeMRC\Http\Requests;

class ProjectFileController extends MainController
{
    public function __construct(ProjectFileService $service, ProjectFileRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function listFile($project_id)
    {
        return $this->repository->findWhere(['project_id'=>$project_id]);
    }
    public function storeFile(Request $request, $project_id)
    {
        return $this->service->createFile($request->all(), $project_id);
    }

    public function destroyFile($project_id, $id)
    {
        return $this->service->destroyFile($project_id, $id);
    }
}
