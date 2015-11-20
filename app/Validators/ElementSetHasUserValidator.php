<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ElementSetHasUserValidator extends LaravelValidator
{
    protected $rules = [
        "schema_id" => "required|",
        "user_id" => "required|",
        "languages" => "max:65535",
        "default_language" => "required|max:6",
        "current_language" => "max:6"
    ];

}
