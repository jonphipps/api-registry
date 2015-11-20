<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class BatchValidator extends LaravelValidator
{
    protected $rules = [
        "run_description" => "max:65535",
        "object_type" => "max:20",
        "event_type" => "max:20",
        "event_description" => "max:65535",
        "registry_uri" => "max:255"
    ];

}
