<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 16/08/15
 * Time: 16:12
 */

namespace CodeMRC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ClientRepository extends RepositoryInterface
{
    public function listPage($limit = NULL, $order = []);
}