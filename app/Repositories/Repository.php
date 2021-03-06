<?php

namespace CodeMRC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class Repository extends BaseRepository
{
    protected $order = ['id', 'desc'];

    protected $limit = 5;

    protected $_model;

    protected $_modelPresenter;

    public function model()
    {
        return $this->_model;
    }

    public function listPage($limit = NULL, $order = [])
    {
        if($limit!=NULL) $this->limit = $limit;

        if($order!=array()) $this->order = $order;

        return $this->scopeQuery(function($query)
        {
            return $query->orderBy($this->order[0],$this->order[1]);
        })->paginate($this->limit);
    }
    /**
     * get the field allow in the class
     * @return array
     */
    public function attributes()
    {
        return $this->model->getFillable();
    }

    public function presenter()
    {
        return $this->_modelPresenter;
    }
}