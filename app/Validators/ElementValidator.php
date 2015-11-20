<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ElementValidator extends LaravelValidator
{
    protected $rules = [
        "updated_at" => "required|",
        "schema_id" => "required|",
        "name" => "required|max:255",
        "label" => "required|max:255",
        "definition" => "max:65535",
        "comment" => "max:65535",
        "type" => "required|max:15",
        "parent_uri" => "max:255",
        "uri" => "required|max:255",
        "status_id" => "required|",
        "language" => "required|max:6",
        "note" => "max:65535",
        "domain" => "max:255",
        "orange" => "max:255",
        "url" => "max:255",
        "lexical_alias" => "max:255"
    ];

}
