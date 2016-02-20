<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Services\ClientService;
use CodeMRC\Repositories\ClientRepository;

class ClientController extends MainController
{
    protected $_controller_name = 'client';

    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
}
