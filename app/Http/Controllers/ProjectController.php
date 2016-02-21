<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Services\ProjectService;
use CodeMRC\Repositories\UserRepository;
use CodeMRC\Repositories\ClientRepository;
use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Repositories\ProjectMembersRepository;
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

    private $authorizerId;
    private $memberService;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     * @param ClientRepository $clientRepository
     * @param UserRepository $userRepository
     * @param ProjectMembersRepository $memberService
     */
    public function __construct(ProjectRepository $repository,
                                ProjectService $service,
                                ClientRepository $clientRepository,
                                UserRepository $userRepository,
                                ProjectMembersRepository $memberService)
    {
        $this->service              = $service;
        $this->repository           = $repository;
        $this->clientRepository     = $clientRepository;
        $this->userRepository       = $userRepository;
        $this->memberService        = $memberService;
        $this->authorizerId = \Authorizer::getResourceOwnerId();
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
    /*
     | -----------------------------------------------------------------------------------------------------------------
     | subscribe the parent methods
     | -----------------------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        return $this->repository->all();//(['owner_id' => $this->authorizerId]);
    }
    protected function checkAuthorizer($id)
    {
        $userId = $this->authorizerId;
        $isMember = $this->memberService->findMember($id, $userId);

        if ( !( $this->repository->isOwner($id, $userId) || count($isMember) > 0 ) )
        {
            return response()->json(['status' => 'error', 'message' => 'this user is not the owner of this project'], 403);
        }
        return true;
    }
}
