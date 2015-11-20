<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * App\Entities\Profile
 *
 * @property integer $id
 * @property integer $agent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $child_updated_at
 * @property integer $child_updated_by
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
 * @property-read \App\Entities\Agent $Agent
 * @property-read \App\Entities\Status $Status
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\User $UserDeletor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ProfileProperty[] $profileProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $Schemas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Vocabulary[] $Vocabularies
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereChildUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereChildUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereBaseDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereCommunity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereLastUriId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Profile whereLanguage($value)
 */
class Profile extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

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
        "agent_id" => "required|",
        "name" => "required|max:255",
        "note" => "max:65535",
        "uri" => "required|max:255",
        "url" => "max:255",
        "base_domain" => "required|max:255",
        "token" => "required|max:45",
        "community" => "max:45",
        "status_id" => "required|",
        "language" => "required|max:6"
    ];

    public function Agent()
    {
        return $this->belongsTo('App\Entities\Agent', 'agent_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_by', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_by', 'id');
    }

    public function UserDeletor()
    {
        return $this->belongsTo('App\Entities\User', 'deleted_by', 'id');
    }

    public function profileProperties()
    {
        return $this->hasMany('App\Entities\ProfileProperty', 'profile_id', 'id');
    }

    public function Schemas()
    {
        return $this->hasMany('App\Entities\ElementSet', 'profile_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Entities\Vocabulary', 'profile_id', 'id');
    }

}
