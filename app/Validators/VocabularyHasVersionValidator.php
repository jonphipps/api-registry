<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class VocabularyHasVersionValidator extends LaravelValidator
{
    protected $rules = [
        "name" => "required|max:255"
    ];

}
