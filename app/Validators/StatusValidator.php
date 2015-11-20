<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class StatusValidator extends LaravelValidator
{
    protected $rules = [
        "display_name" => "max:255",
        "uri" => "max:255"
    ];

}
