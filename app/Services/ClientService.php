<?php

namespace CodeMRC\Services;

use CodeMRC\Repositories\ClientRepository;
use CodeMRC\Validators\ClientValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;
    protected $validator;
    /**
     * @param ClientRepository $repository
     * @param ClientValidator $validator
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(Array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->repository->create($data);
        } catch(ValidatorException $e){
            return redirect("client/create")
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
        return redirect("client");
    }

    public function update(Array $data,$id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->repository->update($data, $id);
        } catch(ValidatorException $e){
            return redirect("client/{$id}/edit")
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
        return redirect("client");
    }

    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}