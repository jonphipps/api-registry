<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementSet extends Model
{
    use SoftDeletes;

	public $table = "reg_schema";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "id",
		"agent_id",
		"created_at",
		"updated_at",
		"deleted_at",
		"created_user_id",
		"updated_user_id",
		"child_updated_at",
		"child_updated_user_id",
		"name",
		"note",
		"uri",
		"url",
		"base_domain",
		"token",
		"community",
		"last_uri_id",
		"status_id",
		"language",
		"profile_id",
		"ns_type",
		"prefixes",
		"languages",
		"repo"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"agent_id" => "integer",
		"created_user_id" => "integer",
		"updated_user_id" => "integer",
		"child_updated_user_id" => "integer",
		"name" => "string",
		"note" => "string",
		"uri" => "string",
		"url" => "string",
		"base_domain" => "string",
		"token" => "string",
		"community" => "string",
		"last_uri_id" => "integer",
		"status_id" => "integer",
		"language" => "string",
		"profile_id" => "integer",
		"ns_type" => "string",
		"prefixes" => "string",
		"languages" => "string",
		"repo" => "string"
    ];

	public static $rules = [
	    
	];

}
