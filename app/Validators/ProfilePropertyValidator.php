<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ProfilePropertyValidator extends LaravelValidator
{
    protected $rules = [
        "skos_id" => "required|",
        "updated_at" => "required|",
        "profile_id" => "required|",
        "name" => "required|max:255",
        "label" => "required|max:255",
        "definition" => "max:65535",
        "comment" => "max:65535",
        "type" => "required|",
        "uri" => "max:255",
        "status_id" => "required|",
        "language" => "required|max:6",
        "note" => "max:65535",
        "examples" => "max:255",
        "is_required" => "required|",
        "is_reciprocal" => "required|",
        "is_singleton" => "required|",
        "is_in_picklist" => "required|",
        "is_in_export" => "required|",
        "is_in_class_picklist" => "required|",
        "is_in_property_picklist" => "required|",
        "is_in_rdf" => "required|",
        "is_in_xsd" => "required|",
        "is_attribute" => "required|",
        "has_language" => "required|",
        "is_object_prop" => "required|",
        "is_in_form" => "required|"
    ];

}
