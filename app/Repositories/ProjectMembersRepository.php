<?php

namespace CodeMRC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ProjectMembersRepository extends RepositoryInterface
{
    public function listPage($limit = NULL, $order = []);
}
