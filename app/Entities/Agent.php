<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\Agent
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $last_updated
 * @property \Carbon\Carbon $deleted_at
 * @property string $org_email
 * @property string $org_name
 * @property string $ind_affiliation
 * @property string $ind_role
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $country
 * @property string $phone
 * @property string $web_address
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Profile[] $Profiles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\User[] $Users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $Schemas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Vocabulary[] $Vocabularies
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereOrgEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereOrgName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereIndAffiliation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereIndRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereAddress1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereAddress2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent wherePostalCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereWebAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Agent whereType($value)
 */
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
        return $this->hasMany('App\Entities\Profile', 'agent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\Entities\User', 'AgentHasUser')
            ->withPivot('is_registrar_for', 'is_admin_for')
            ->withTimestamps();
    }

    public function Schemas()
    {
        return $this->hasMany('App\Entities\ElementSet', 'agent_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Entities\Vocabulary', 'agent_id', 'id');
    }

}
