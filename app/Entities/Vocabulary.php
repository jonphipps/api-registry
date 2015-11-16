<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\Vocabulary
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
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\User[] $Users
 * @property-read \App\Entities\Profile $Profile
 * @property-read \App\Entities\Agent $Agent
 * @property-read \App\Entities\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Collection[] $Collections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Concept[] $Concepts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptProperty[] $ConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistoryObjects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\FileImportHistory[] $FileImportHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\VocabularyHasVersion[] $Versions
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereChildUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereChildUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereBaseDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereCommunity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereLastUriId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereLanguages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereNsType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary wherePrefixes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereRepos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Vocabulary whereRepo($value)
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
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\Entities\User', 'VocabularyHasUser')
            ->withPivot('is_maintainer_for',
            'is_registrar_for', 'is_admin_for', 'languages',
            'default_language', 'current_language')
            ->withTimestamps();
    }

    public function Profile()
    {
        return $this->belongsTo('App\Entities\Profile', 'profile_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Entities\Agent', 'agent_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function Collections()
    {
        return $this->hasMany('App\Entities\Collection', 'vocabulary_id', 'id');
    }

    public function Concepts()
    {
        return $this->hasMany('App\Entities\Concept', 'vocabulary_id', 'id');
    }

    public function ConceptProperties()
    {
        return $this->hasMany('App\Entities\ConceptProperty', 'scheme_id', 'id');
    }

    public function ConceptPropertyHistoryObjects()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'scheme_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'vocabulary_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Entities\Discuss', 'vocabulary_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->hasMany('App\Entities\FileImportHistory', 'vocabulary_id', 'id');
    }

    public function Versions()
    {
        return $this->hasMany('App\Entities\VocabularyHasVersion', 'vocabulary_id', 'id');
    }

}
