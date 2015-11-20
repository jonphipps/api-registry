<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class PrefixValidator extends LaravelValidator
{
    protected $rules = [
        "prefix" => "required|max:40",
        "uri" => "max:256"
    ];

}
