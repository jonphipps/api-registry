<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ProfileValidator extends LaravelValidator
{
    protected $rules = [
        "agent_id" => "required|",
        "name" => "required|max:255",
        "note" => "max:65535",
        "uri" => "required|max:255",
        "url" => "max:255",
        "base_domain" => "required|max:255",
        "token" => "required|max:45",
        "community" => "max:45",
        "status_id" => "required|",
        "language" => "required|max:6"
    ];

}
