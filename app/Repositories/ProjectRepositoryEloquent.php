<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 16/08/15
 * Time: 18:42
 */

namespace CodeMRC\Repositories;

use CodeMRC\Entities\Project;

class ProjectRepositoryEloquent extends Repository implements ProjectRepository
{
    protected $_model = Project::class;
}