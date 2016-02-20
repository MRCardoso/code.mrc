<?php

namespace CodeMRC\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        "name" => "required|max:80",
        "description" => "required|max:255",
        "progress" => "required|integer",
        "status" => "required|integer",
        "client_id" => "required|integer",
        "owner_id" => "required|integer"
    ];
}