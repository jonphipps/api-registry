<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ConceptPropertyHistoryValidator extends LaravelValidator
{
    protected $rules = [
        "created_at" => "required|",
        "object" => "max:65535",
        "language" => "max:6",
        "change_note" => "max:65535"
    ];

}
