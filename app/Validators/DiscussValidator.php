<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class DiscussValidator extends LaravelValidator
{
    protected $rules = [
        "uri" => "max:255",
        "subject" => "max:255",
        "content" => "max:65535"
    ];

}
