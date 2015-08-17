<?php

namespace CodeMRC\Http\Controllers;

use CodeMRC\Services\ProjectService;
use CodeMRC\Repositories\UserRepository;
use CodeMRC\Repositories\ClientRepository;
use CodeMRC\Repositories\ProjectRepository;

/**
 * Class ProjectController
 * @package CodeMRC\Http\Controllers
 */
class ProjectController extends MainController
{
    private $progress = array(
        0 => [ "name" => "Open", "class" => "info" ],
        1 => [ "name" =>  "Concluded", "class" => "success" ],
        2 => [ "name" => "Canceled", "class" => "danger" ],
        3 => [ "name" => "In process", "class" => "warning" ],
        4 => [ "name" => "Expired", "class" => "default" ],
    );
    protected $_controller_name = 'project';
    /**
     * @var ClientRepository
     */
    protected $clientRepository;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     * @param ClientRepository $clientRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ProjectRepository $repository,
                                ProjectService $service,
                                ClientRepository $clientRepository,
                                UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
        $this->params["progress"] = $this->progress;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('project.create', [
            'module'=>'Project',
            'save' => 'Create',
            'data'=> $this->listDependences(),
            'progress' => $this->listProgress()
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $object = $this->repository->find($id);

        return view('project.edit', [
            'module'=>'Project',
            'save' => 'Edit',
            'object' => $object,
            'data'=> $this->listDependences(),
            'progress' => $this->listProgress()
        ]);
    }
    /**
     * set a dropdown with the list of the clients and users
     *
     * @return object
     */
    private function listDependences()
    {
        $clients = $users = [];
        $clients[""] = $users[""] = "Selecione";
        foreach ($this->clientRepository->all() as $client)
        {
            $clients[$client->id] = $client->name;
        }
        foreach ($this->userRepository->all() as $user)
        {
            $users[$user->id] = $user->name;
        }
        return (object) [
            "users" => $users,
            "clients" => $clients
        ];
    }
    private function listProgress()
    {
        $array = [];
        $array[""] = "Selecione";
        foreach ($this->progress as $k=>$row) {
            $array[$k] = $row["name"];
        }
        return $array;
    }
}
