<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 16/08/15
 * Time: 18:41
 */

namespace CodeMRC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ProjectRepository extends RepositoryInterface
{
    public function listPage($limit = NULL, $order = []);
}