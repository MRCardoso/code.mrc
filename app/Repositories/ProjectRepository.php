<?php
namespace CodeMRC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ProjectRepository extends RepositoryInterface
{
    public function listPage($limit = NULL, $order = []);
}