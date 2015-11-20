<?php namespace App\Validators;

use Prettus\Validator\LaravelValidator;
class AgentValidator extends LaravelValidator
{
    protected $rules = [
        "last_updated" => "required|",
        "org_email" => "required|max:100",
        "org_name" => "required|max:255",
        "ind_affiliation" => "max:255",
        "ind_role" => "max:45",
        "address1" => "max:255",
        "address2" => "max:255",
        "city" => "max:45",
        "state" => "max:2",
        "postal_code" => "max:15",
        "country" => "max:3",
        "phone" => "max:45",
        "web_address" => "max:255",
        "type" => "max:15"
    ];

}
