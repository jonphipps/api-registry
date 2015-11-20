<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ElementSetHasVersionValidator extends LaravelValidator
{
    protected $rules = [
        "name" => "required|max:255"
    ];

}
