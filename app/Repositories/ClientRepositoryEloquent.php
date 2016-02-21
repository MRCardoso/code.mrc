<?php

namespace CodeMRC\Repositories;

use CodeMRC\Entities\Client;
use CodeMRC\Presenters\ClientPresenter;

class ClientRepositoryEloquent extends Repository implements ClientRepository
{
    protected $_model = Client::class;

    protected $_modelPresenter = ClientPresenter::class;
}