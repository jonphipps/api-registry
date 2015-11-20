<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ConceptPropertyValidator extends LaravelValidator
{
    protected $rules = [
        "updated_at" => "required|",
        "concept_id" => "required|",
        "skos_property_id" => "required|",
        "object" => "max:65535",
        "language" => "max:6",
        "is_concept_property" => "required|"
    ];

}
