<?php
namespace CodeMRC\Repositories;

use CodeMRC\Entities\ProjectMembers;

class ProjectMembersRepositoryEloquent extends Repository implements ProjectMembersRepository
{
    protected $_model = ProjectMembers::class;
}