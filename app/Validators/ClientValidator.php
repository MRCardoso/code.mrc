<?php

namespace CodeMRC\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "email" => "required|email|unique:client|max:255",
            "name" => "required|max:255",
            "responsible" => "required|max:255",
            "phone" => "required|max:255",
            "address" => "required|max:255",
            "observation" => "required|max:255",
        ],
        ValidatorInterface::RULE_UPDATE => [
            "name" => "required|max:255",
            "responsible" => "required|max:255",
            "phone" => "required|max:255",
            "address" => "required|max:255",
            "observation" => "required|max:255",
        ],
    ];
}