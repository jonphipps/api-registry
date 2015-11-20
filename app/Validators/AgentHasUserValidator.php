<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class AgentHasUserValidator extends LaravelValidator
{
    protected $rules = [
        "updated_at" => "required|",
        "user_id" => "required|",
        "agent_id" => "required|"
    ];

}
