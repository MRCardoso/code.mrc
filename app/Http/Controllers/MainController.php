<?php

namespace CodeMRC\Http\Controllers;

use Illuminate\Http\Request;

abstract class MainController extends Controller
{
    /**
     * @var array
     */
    protected $params = [];

    protected $_controller_name;
    /**
     * @var {$_controller_name}Repository
     */
    protected $repository;
    /**
     * @var {$_controller_name}Service
     * */
    protected $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $output = $this->repository->listPage();
        $data = [
            'module' => ucwords($this->_controller_name),
            'output' => $output
        ];

        if($this->params!==array())
        {
            foreach ($this->params as $k=>$v)
                $data[$k] = $v;
        }
        return view("{$this->_controller_name}.index",$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("{$this->_controller_name}.create", [
            'module' => ucwords($this->_controller_name),
            'save' => 'Create'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $output = $this->repository->find($id);
        $data = [
            'module' => ucwords($this->_controller_name),
            'save' => 'View',
            'output' => $output
        ];
        if($this->params!==array())
        {
            foreach ($this->params as $k=>$v)
                $data[$k] = $v;
        }
        return view("{$this->_controller_name}.show",$data);
    }
    /**
     * Show the form for updating a resource.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $object = $this->repository->find($id);

        return view("{$this->_controller_name}.edit", [
            'module'    => ucwords($this->_controller_name),
            'save'      => 'Edit',
            'object'  => $object
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(),$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect($this->_controller_name);
    }
//    protected abstract function validations($request);
}