<?php

namespace CodeMRC\Repositories;

use CodeMRC\Entities\User;

class UserRepositoryEloquent extends Repository implements UserRepository
{
    protected $_model = User::class;
}