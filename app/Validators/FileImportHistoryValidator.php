<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class FileImportHistoryValidator extends LaravelValidator
{
    protected $rules = [
        "map" => "max:65535",
        "file_name" => "max:255",
        "source_file_name" => "max:255",
        "file_type" => "max:30",
        "results" => "max:65535"
    ];

}
