<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Vocabulary
 *
 * @property integer $id
 * @property integer $agent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $last_updated
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
 * @property integer $status_id This will be the default status id for all concept properties for this vocabulary
 * @property string $language This is the default language for all concept properties
 * @property string $languages
 * @property integer $profile_id
 * @property string $ns_type
 * @property string $prefixes
 * @property string $repos
 * @property string $repo
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserUpdater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $Users
 * @property-read \App\Models\Profile $Profile
 * @property-read \App\Models\Agent $Agent
 * @property-read \App\Models\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Collection[] $Collections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Concept[] $Concepts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $ConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistoryObjects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileImportHistory[] $FileImportHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VocabularyHasVersion[] $Versions
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereChildUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereChildUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereBaseDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereCommunity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereLastUriId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereLanguages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereNsType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary wherePrefixes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereRepos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vocabulary whereRepo($value)
 */
class Vocabulary extends Model
{
    use SoftDeletes;

    protected $table = 'reg_vocabulary';
    
	protected $dates = ['deleted_at', 'last_updated'];


    protected $fillable = array('deleted_at', 'last_updated', 'name', 'note', 'uri', 'url',
        'base_domain', 'token', 'community', 'last_uri_id', 'language', 'languages', 'ns_type', 'prefixes', 'repos', 'repo');



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
		"languages" => "string",
		"profile_id" => "integer",
		"ns_type" => "string",
		"prefixes" => "string",
		"repos" => "string",
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\Models\User', 'VocabularyHasUser')
            ->withPivot('is_maintainer_for',
            'is_registrar_for', 'is_admin_for', 'languages',
            'default_language', 'current_language')
            ->withTimestamps();
    }

    public function Profile()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function Collections()
    {
        return $this->hasMany('App\Models\Collection', 'vocabulary_id', 'id');
    }

    public function Concepts()
    {
        return $this->hasMany('App\Models\Concept', 'vocabulary_id', 'id');
    }

    public function ConceptProperties()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'scheme_id', 'id');
    }

    public function ConceptPropertyHistoryObjects()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'scheme_id', 'id');
    }

    public function ConceptPropertyHistories()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'vocabulary_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'vocabulary_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->hasMany('App\Models\FileImportHistory', 'vocabulary_id', 'id');
    }

    public function Versions()
    {
        return $this->hasMany('App\Models\VocabularyHasVersion', 'vocabulary_id', 'id');
    }

}
