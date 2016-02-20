<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Services\ProjectService;
use CodeMRC\Repositories\UserRepository;
use CodeMRC\Repositories\ClientRepository;
use CodeMRC\Repositories\ProjectRepository;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 * @package CodeMRC\Http\Controllers
 */
class ProjectController extends MainController
{
    protected $_controller_name = 'project';
    /**
     * @var ClientRepository
     */
    protected $clientRepository;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     * @param ClientRepository $clientRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ProjectRepository $repository,
                                ProjectService $service,
                                ClientRepository $clientRepository,
                                UserRepository $userRepository)
    {
        $this->service              = $service;
        $this->repository           = $repository;
        $this->clientRepository     = $clientRepository;
        $this->userRepository       = $userRepository;
    }
    public function members($id)
    {
        return response()->json(
            $this->repository->with(['projectMembers'])->find($id)
        );
    }

    public function addMember(Request $request, $id)
    {
        $data = $request->all();
        $data["project_id"] = $id;
        return $this->service->addMember($data);
    }

    public function removeMember($id, $member)
    {
        return $this->service->removeMember($id, $member);
    }
}
