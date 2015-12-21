<?php
namespace CodeMRC\Services;

use CodeMRC\Repositories\ProjectMembersRepository;
use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ProjectMembersValidator;
use CodeMRC\Validators\ProjectValidator;
use PhpParser\Node\Expr\Array_;

class ProjectService extends Service
{
    /**
     * @var ProjectMembersService
     */
    private $membersService;
    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     * @param ProjectMembersService $membersService
     */
    public function __construct(
        ProjectRepository $repository,
        ProjectValidator $validator,
        ProjectMembersService $membersService)
    {
        $this->membersService = $membersService;
        $this->repository = $repository;
        $this->validator = $validator;
    }
    public function addMember(Array $data)
    {
        return $this->membersService->create($data);
    }
    public function removeMember($id, $member)
    {
        return $this->membersService->destroyMember($id, $member);
    }
}