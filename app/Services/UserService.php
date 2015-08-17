<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 16/08/15
 * Time: 19:16
 */

namespace CodeMRC\Services;


use CodeMRC\Repositories\UserRepository;
use CodeMRC\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $repository;
    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(Array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->repository->create($data);
            return redirect("user");
        } catch(ValidatorException $e){
            return redirect("user/create")
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

    public function update(Array $data,$id)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->repository->update($data, $id);
        } catch(ValidatorException $e){
            return redirect("user/{$id}/edit")
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
        return redirect("user");
    }

    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}