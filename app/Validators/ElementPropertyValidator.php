<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ElementPropertyValidator extends LaravelValidator
{
    protected $rules = [
        "updated_at" => "required|",
        "schema_property_id" => "required|",
        "profile_property_id" => "required|",
        "object" => "max:65535",
        "language" => "required|max:6",
        "is_generated" => "required|"
    ];

}
