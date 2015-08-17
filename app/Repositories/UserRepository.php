<?php

namespace CodeMRC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface UserRepository extends RepositoryInterface
{
    public function listPage($limit = NULL, $order = []);
}