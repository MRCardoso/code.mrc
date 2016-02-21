<?php
namespace CodeMRC\Services;

use CodeMRC\Repositories\ProjectFileRepository;
use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ProjectValidator;


class ProjectService extends Service
{
    /**
     * @var ProjectMembersService
     */
    private $membersService;
    private $projectFileRepository;

    public function __construct(
        ProjectRepository $repository,
        ProjectValidator $validator,
        ProjectMembersService $membersService,
        ProjectFileRepository $projectFileRepository)
    {
        $this->projectFileRepository = $projectFileRepository;
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