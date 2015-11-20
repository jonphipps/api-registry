<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class VocabularyHasUserValidator extends LaravelValidator
{
    protected $rules = [
        "updated_at" => "required|",
        "vocabulary_id" => "required|",
        "user_id" => "required|",
        "languages" => "max:65535",
        "default_language" => "max:6",
        "current_language" => "max:6"
    ];

}
