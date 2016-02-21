<?php

namespace CodeMRC\Repositories;

use CodeMRC\Entities\User;
use CodeMRC\Presenters\UserPresenter;

class UserRepositoryEloquent extends Repository implements UserRepository
{
    protected $_model = User::class;

    protected $_modelPresenter = UserPresenter::class;
}