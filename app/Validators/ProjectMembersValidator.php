<?php
namespace CodeMRC\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectMembersValidator extends LaravelValidator
{
    protected $rules = [
        "user_id" => "required|integer",
        "project_id" => "required|integer"
    ];
}