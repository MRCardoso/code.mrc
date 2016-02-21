<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Repositories\ProjectMembersRepository;
use CodeMRC\Services\ProjectMembersService;
use Illuminate\Support\Facades\Request;

class ProjectMembersController extends MainController
{
    protected $_controller_name = 'project_members';

    /**
     * @param ProjectMembersRepository $repository
     * @param ProjectMembersService $service
     */
    public function __construct(ProjectMembersRepository $repository, ProjectMembersService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function members($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function isMember($id, $member)
    {
        $result = $this->repository->findMember($id, $member);
        $output = count($result) > 0
            ? ["status" => "success", "message" => "este Usuário {$member} é membro deste projeto {$id}"]
            : ["status" => "error", "message" => "este Usuário {$member} não é membro deste projeto {$id}"];

        return response()->json($output, ( $output["status"] == "error" ? 403 : 200) );
    }
}

