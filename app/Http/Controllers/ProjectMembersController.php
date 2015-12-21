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
    public function isMember($id, $member)
    {
        $result = $this->service->findMember($id, $member);
        return (
            count($result) > 0
                ? "este Usuário {$member} é membro deste projeto {$id}"
                : "este Usuário {$member} não é membro deste projeto {$id}"
        );
    }
}

