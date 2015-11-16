<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\ElementSet
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
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \App\Entities\Agent $Agent
 * @property-read \App\Entities\Profile $Profile
 * @property-read \App\Entities\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\FileImportHistory[] $FileImportHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\RdfNamespace[] $RdfNamespaces
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Element[] $Elements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementPropertyHistory[] $ElementPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSetHasUser[] $ElementSetHasUsers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSetHasVersion[] $ElementSetHasVersions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $Users
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereChildUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereChildUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereBaseDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereCommunity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereLastUriId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereNsType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet wherePrefixes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereLanguages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementSet whereRepo($value)
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
	    "agent_id" => "required|",
		"name" => "required|max:255",
		"note" => "max:65535",
		"uri" => "required|max:255",
		"url" => "max:255",
		"base_domain" => "required|max:255",
		"token" => "required|max:45",
		"community" => "max:45",
		"status_id" => "required|",
		"language" => "required|max:6",
		"ns_type" => "required|max:6",
		"prefixes" => "max:65535",
		"languages" => "max:65535",
		"repo" => "required|max:255"
	];

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_user_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Entities\Agent', 'agent_id', 'id');
    }

    public function Profile()
    {
        return $this->belongsTo('App\Entities\Profile', 'profile_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Entities\Discuss', 'schema_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->hasMany('App\Entities\FileImportHistory', 'schema_id', 'id');
    }

    public function RdfNamespaces()
    {
        return $this->hasMany('App\Entities\RdfNamespace', 'schema_id', 'id');
    }

    public function Elements()
    {
        return $this->hasMany('App\Entities\Element', 'schema_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Entities\ElementPropertyHistory', 'schema_id', 'id');
    }

    public function ElementSetHasUsers()
    {
        return $this->hasMany('App\Entities\ElementSetHasUser', 'schema_id', 'id');
    }

    public function ElementSetHasVersions()
    {
        return $this->hasMany('App\Entities\ElementSetHasVersion', 'schema_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\Entities\ElementSet', 'SchemaHasUser')
                ->withPivot('is_maintainer_for',
                        'is_registrar_for', 'is_admin_for', 'languages',
                        'default_language', 'current_language')
                ->withTimestamps();
    }


}
