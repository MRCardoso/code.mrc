<?php

namespace CodeMRC\Repositories;

use CodeMRC\Entities\Client;

class ClientRepositoryEloquent extends Repository implements ClientRepository
{
    protected $_model = Client::class;
}