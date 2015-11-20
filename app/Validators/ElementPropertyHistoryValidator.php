<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ElementPropertyHistoryValidator extends LaravelValidator
{
    protected $rules = [
        "created_at" => "required|",
        "object" => "max:65535",
        "language" => "required|max:6",
        "change_note" => "max:65535"
    ];

}
