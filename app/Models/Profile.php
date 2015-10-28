<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'profile';
    
	protected $dates = ['deleted_at'];


    protected $fillable = array('deleted_at', 'name', 'note', 'uri', 'url', 'base_domain', 'token',
        'community', 'last_uri_id', 'language');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"agent_id" => "integer",
		"created_by" => "integer",
		"updated_by" => "integer",
		"deleted_by" => "integer",
		"child_updated_by" => "integer",
		"name" => "string",
		"note" => "string",
		"uri" => "string",
		"url" => "string",
		"base_domain" => "string",
		"token" => "string",
		"community" => "string",
		"last_uri_id" => "integer",
		"status_id" => "integer",
		"language" => "string"
    ];

	public static $rules = [
	    
	];

    public function Agent()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function UserDeletor()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }

    public function profileProperties()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'profile_id', 'id');
    }

    public function Schemas()
    {
        return $this->hasMany('App\Models\Schema', 'profile_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary', 'profile_id', 'id');
    }

}
