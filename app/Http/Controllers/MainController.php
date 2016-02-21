<?php
/**
 * this is the main class for execution the CRUD in all modules
 * and implement the REST methods GET PUT POST and DELETE
 */
namespace CodeMRC\Http\Controllers;

use Illuminate\Http\Request;

abstract class MainController extends Controller
{
    /**
     * object dynamic informed in the called of the view
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
        return $this->repository->all();
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
        if( ( $result = $this->checkAuthorizer($id) ) !== TRUE )
            return $result;

        return $this->repository->find($id);
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
        if( ( $result = $this->checkAuthorizer($id) ) !== TRUE )
            return $result;

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
        if( ( $result = $this->checkAuthorizer($id) ) !== TRUE )
            return $result;

        return $this->service->destroy($id);
    }

    /**
     * method to verify in actions show,update and destroy
     * the authorization of the user to access this method
     * by default return true
     *
     * @param $id
     * @return bool
     */
    protected function checkAuthorizer($id)
    {
        return TRUE;
    }
}