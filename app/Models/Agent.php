<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;

    protected $table = 'reg_agent';
    
	protected $dates = ['deleted_at', 'last_updated'];


    protected $fillable = array('last_updated', 'deleted_at', 'org_email', 'org_name', 'ind_affiliation', 'ind_role',
        'address1', 'address2', 'city', 'state', 'postal_code', 'country', 'phone', 'web_address', 'type');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"org_email" => "string",
		"org_name" => "string",
		"ind_affiliation" => "string",
		"ind_role" => "string",
		"address1" => "string",
		"address2" => "string",
		"city" => "string",
		"state" => "string",
		"postal_code" => "string",
		"country" => "string",
		"phone" => "string",
		"web_address" => "string",
		"type" => "string"
    ];

	public static $rules = [
	    
	];

    public function Profiles()
    {
        return $this->hasMany('App\Models\Profile', 'agent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\Models\User', 'AgentHasUser')
            ->withPivot('is_registrar_for', 'is_admin_for')
            ->withTimestamps();
    }

    public function Schemas()
    {
        return $this->hasMany('App\Models\Schema', 'agent_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary', 'agent_id', 'id');
    }

}
