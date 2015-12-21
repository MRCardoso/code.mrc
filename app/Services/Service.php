<?php
/*
 | ----------------------------------------------------------------------------------
 | API use the standard RESTFUL to work with layer of the data manipulation for CRUD
 | ----------------------------------------------------------------------------------
 |
 */
namespace CodeMRC\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class Service
{
    /**
     * @var
     */
    protected $repository;
    /**
     * @var
     */
    protected $validator;

    public function create(Array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $this->validateField($this->repository->attributes(), $data);
            return $this->repository->create($data);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    /**
     * Update a record
     *
     * @param array $data
     * @param $id
     * @return \Illuminate\Support\MessageBag
     */
    public function update(Array $data,$id)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->validateField($this->repository->attributes(), $data);
            return $this->repository->update($data, $id);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    /**
     * Delete a record
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if($this->repository->delete($id))
        {
            $response = [
                "status" => true,
                "message" => "Registro removido com sucesso"
            ];
        }
        else
        {
            $response = [
                "status" => false,
                "message" => "falha ao remover Registro"
            ];
        }
        return response()->json($response);
    }
    /*
     | ----------------------------------------------------------------------------------
     | Validate field
     | ----------------------------------------------------------------------------------
     | prepare fields before save in database
     | clear mask from phone,cpf,cnpj
     | convert float number and date to format database
     |
     */
    protected function validateField($attributes, &$fields)
    {
        foreach ($attributes as $line)
        {
            if( isset($fields[$line]) )
            {
                $fields[$line] = $fields[$line] === "" ? NULL : $fields[$line];
                if( substr_count($fields[$line], ',') == 1)
                {
                    $fields[$line] = str_replace('.', '', $fields[$line]);
                    $fields[$line] = str_replace(',', '.', $fields[$line]);
                }
                else if( preg_match("/(\(|\)| |-|\.)/", $fields[$line]) )
                {
                    $regex = "/(\(|\)|-| |\/|\.)/";

                    if( ( (int) preg_replace($regex,"", $fields[$line]) ) != 0 )
                        $fields[$line] = preg_replace($regex,"", $fields[$line]);
                }
            }
        }
    }
}