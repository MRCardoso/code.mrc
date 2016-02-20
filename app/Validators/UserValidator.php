<?php
/**
 * Created by PhpStorm.
 * User: mrcardoso
 * Date: 16/08/15
 * Time: 21:30
 */

namespace CodeMRC\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "name" => "required|max:255",
            "email" => "required|email|unique:user|max:255",
            "password" => "required"
        ],
        ValidatorInterface::RULE_UPDATE => [
            "name" => "required|max:255",
            "email" => "required|email|unique:user|max:255",
        ]
    ];
}