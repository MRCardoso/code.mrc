<?php

namespace CodeMRC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProjectTaskRepositoryRepository
 * @package namespace CodeMRC\Repositories;
 */
interface ProjectFileRepository extends RepositoryInterface
{
    public function listPage($limit = NULL, $order = []);
}
