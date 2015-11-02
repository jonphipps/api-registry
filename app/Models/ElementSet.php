<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ElementSet
 *
 * @property integer $id
 * @property integer $agent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property string $child_updated_at
 * @property integer $child_updated_user_id
 * @property string $name
 * @property string $note
 * @property string $uri
 * @property string $url
 * @property string $base_domain
 * @property string $token
 * @property string $community
 * @property integer $last_uri_id
 * @property integer $status_id
 * @property string $language
 * @property integer $profile_id
 * @property string $ns_type
 * @property string $prefixes
 * @property string $languages
 * @property string $repo
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\Agent $Agent
 * @property-read \App\Models\Profile $Profile
 * @property-read \App\Models\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileImportHistory[] $FileImportHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RdfNamespace[] $RdfNamespaces
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Element[] $Elements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $ElementPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSetHasUser[] $ElementSetHasUsers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSetHasVersion[] $ElementSetHasVersions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSet[] $Users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereChildUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereChildUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereBaseDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereCommunity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereLastUriId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereNsType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet wherePrefixes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereLanguages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementSet whereRepo($value)
 */
class ElementSet extends Model
{
    use SoftDeletes;

	public $table = "reg_schema";
    
	protected $dates = ['deleted_at'];

	protected $fillable = array('deleted_at', 'name', 'note', 'uri', 'url',
			'base_domain', 'token', 'community', 'last_uri_id', 'language', 'ns_type', 'prefixes', 'languages', 'repo');

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

	public function UserCreator()
	{
		return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
	}

	public function UserUpdater()
	{
		return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
	}

	public function Agent()
	{
		return $this->belongsTo('App\Models\Agent', 'agent_id', 'id');
	}

	public function Profile()
	{
		return $this->belongsTo('App\Models\Profile', 'profile_id', 'id');
	}

	public function Status()
	{
		return $this->belongsTo('App\Models\Status', 'status_id', 'id');
	}

	public function Discussions()
	{
		return $this->hasMany('App\Models\Discuss', 'schema_id', 'id');
	}

	public function FileImportHistories()
	{
		return $this->hasMany('App\Models\FileImportHistory', 'schema_id', 'id');
	}

	public function RdfNamespaces()
	{
		return $this->hasMany('App\Models\RdfNamespace', 'schema_id', 'id');
	}

	public function Elements()
	{
		return $this->hasMany('App\Models\Element', 'schema_id', 'id');
	}

	public function ElementPropertyHistories()
	{
		return $this->hasMany('App\Models\ElementPropertyHistory', 'schema_id', 'id');
	}

	public function ElementSetHasUsers()
	{
		return $this->hasMany('App\Models\ElementSetHasUser', 'schema_id', 'id');
	}

	public function ElementSetHasVersions()
	{
		return $this->hasMany('App\Models\ElementSetHasVersion', 'schema_id', 'id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function Users()
	{
		return $this->belongsToMany('App\Models\ElementSet', 'SchemaHasUser')
				->withPivot('is_maintainer_for',
						'is_registrar_for', 'is_admin_for', 'languages',
						'default_language', 'current_language')
				->withTimestamps();
	}


}
