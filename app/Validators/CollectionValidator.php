<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class CollectionValidator extends LaravelValidator
{
    protected $rules = [
        "name" => "required|max:255",
        "uri" => "max:255",
        "pref_label" => "required|max:255",
        "status_id" => "required|"
    ];

}
