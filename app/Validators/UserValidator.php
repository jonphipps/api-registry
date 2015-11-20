<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class UserValidator extends LaravelValidator
{
    protected $rules = [
        "last_updated" => "required|",
        "nickname" => "max:50",
        "salutation" => "max:5",
        "first_name" => "max:100",
        "last_name" => "max:100",
        "email" => "email|max:100",
        "sha1_password" => "max:40",
        "salt" => "max:32",
        "password" => "max:40",
        "culture" => "max:7"
    ];

}
