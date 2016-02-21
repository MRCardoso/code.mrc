<?php
namespace CodeMRC\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{
    protected $rules = [
        "name" => "required",
        "description" => "required",
        "file" => "required|mimes:jpeg,txt,doc,csv,xls,png,pdf,gif|max:5000"
    ];
}