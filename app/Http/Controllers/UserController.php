<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Services\UserService;
use CodeMRC\Repositories\UserRepository;

class UserController extends MainController
{
    protected $_controller_name = 'user';

    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
}
