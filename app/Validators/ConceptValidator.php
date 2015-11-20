<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class ConceptValidator extends LaravelValidator
{
    protected $rules = [
        "updated_at" => "required|",
        "uri" => "required|max:255",
        "pref_label" => "required|max:255",
        "status_id" => "required|",
        "language" => "required|max:6"
    ];

}
