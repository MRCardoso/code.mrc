<?php

namespace CodeMRC\Repositories;
use CodeMRC\Entities\ProjectFile;
use CodeMRC\Presenters\ProjectFilePresenter;

/**
 * Class ProjectFileRepositoryEloquent
 * @package namespace CodeMRC\Repositories;
 */
class ProjectFileRepositoryEloquent extends Repository implements ProjectFileRepository
{
    protected $_model = ProjectFile::class;

    protected $_modelPresenter = ProjectFilePresenter::class;
}
