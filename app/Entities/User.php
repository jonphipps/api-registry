<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\User
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property string $last_updated
 * @property \Carbon\Carbon $deleted_at
 * @property string $nickname
 * @property string $salutation
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $sha1_password
 * @property string $salt
 * @property boolean $want_to_be_moderator
 * @property boolean $is_moderator
 * @property boolean $is_administrator
 * @property integer $deletions
 * @property string $password
 * @property string $culture
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Profile[] $ProfilesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Profile[] $ProfilesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Profile[] $ProfilesDeleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ProfileProperty[] $ProfilePropertiesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ProfileProperty[] $ProfilePropertiesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ProfileProperty[] $ProfilePropertiesDeleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Agent[] $Agents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Collection[] $CollectionsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Collection[] $CollectionsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Concept[] $ConceptsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Concept[] $ConceptsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptProperty[] $ConceptPropertiesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptProperty[] $ConceptPropertiesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistoryCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $DiscussionsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $DiscussionsDeleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\FileImportHistory[] $FileImportHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $ElementSetsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $ElementSetsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Element[] $ElementsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Element[] $ElementsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementProperty[] $ElementPropertiesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementProperty[] $ElementPropertiesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementPropertyHistory[] $ElementPropertyHistoryCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Vocabulary[] $VocabulariesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Vocabulary[] $VocabulariesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Vocabulary[] $Vocabularies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $ElementSets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSetHasVersion[] $VocabularyVersionsCreated
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereSalutation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereSha1Password($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereSalt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereWantToBeModerator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereIsModerator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereIsAdministrator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereDeletions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereCulture($value)
 */
class User extends Model
{
    use SoftDeletes;

    protected $table = 'reg_user';

    protected $dates = ['deleted_at'];


    protected $fillable = array('last_updated', 'deleted_at', 'nickname', 'salutation', 'first_name', 'last_name',
        'email', 'sha1_password', 'salt', 'want_to_be_moderator', 'is_moderator', 'is_administrator', 'deletions', 'password',
        'culture');


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "nickname" => "string",
        "salutation" => "string",
        "first_name" => "string",
        "last_name" => "string",
        "email" => "string",
        "sha1_password" => "string",
        "salt" => "string",
        "want_to_be_moderator" => "boolean",
        "is_moderator" => "boolean",
        "is_administrator" => "boolean",
        "deletions" => "integer",
        "password" => "string",
        "culture" => "string"
    ];

	public static $rules = [
	    "last_updated" => "required|",
		"nickname" => "max:50",
		"salutation" => "max:5",
		"first_name" => "max:100",
		"last_name" => "max:100",
		"email" => "email|max:100",
		"sha1_password" => "max:40",
		"salt" => "max:32",
		"password" => "max:40",
		"culture" => "max:7"
	];

    public function ProfilesUpdated()
    {
        return $this->hasMany('App\Entities\Profile', 'updated_by', 'id');
    }

    public function ProfilesCreated()
    {
        return $this->hasMany('App\Entities\Profile', 'created_by', 'id');
    }

    public function ProfilesDeleted()
    {
        return $this->hasMany('App\Entities\Profile', 'deleted_by', 'id');
    }

    public function ProfilePropertiesUpdated()
    {
        return $this->hasMany('App\Entities\ProfileProperty', 'updated_by', 'id');
    }

    public function ProfilePropertiesCreated()
    {
        return $this->hasMany('App\Entities\ProfileProperty', 'created_by', 'id');
    }

    public function ProfilePropertiesDeleted()
    {
        return $this->hasMany('App\Entities\ProfileProperty', 'deleted_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Agents()
    {
        return $this->belongsToMany('App\Entities\Agent', 'AgentHasUser')
            ->withPivot('is_registrar_for', 'is_admin_for')
            ->withTimestamps();
    }

    public function CollectionsCreated()
    {
        return $this->hasMany('App\Entities\Collection', 'created_user_id', 'id');
    }

    public function CollectionsUpdated()
    {
        return $this->hasMany('App\Entities\Collection', 'updated_user_id', 'id');
    }

    public function ConceptsCreated()
    {
        return $this->hasMany('App\Entities\Concept', 'created_user_id', 'id');
    }

    public function ConceptsUpdated()
    {
        return $this->hasMany('App\Entities\Concept', 'updated_user_id', 'id');
    }

    public function ConceptPropertiesCreated()
    {
        return $this->hasMany('App\Entities\ConceptProperty', 'created_user_id', 'id');
    }

    public function ConceptPropertiesUpdated()
    {
        return $this->hasMany('App\Entities\ConceptProperty', 'updated_user_id', 'id');
    }

    public function ConceptPropertyHistoryCreated()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'created_user_id', 'id');
    }

    public function DiscussionsCreated()
    {
        return $this->hasMany('App\Entities\Discuss', 'created_user_id', 'id');
    }

    public function DiscussionsDeleted()
    {
        return $this->hasMany('App\Entities\Discuss', 'deleted_user_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->hasMany('App\Entities\FileImportHistory', 'user_id', 'id');
    }

    public function ElementSetsCreated()
    {
        return $this->hasMany('App\Entities\ElementSet', 'created_user_id', 'id');
    }

    public function ElementSetsUpdated()
    {
        return $this->hasMany('App\Entities\ElementSet', 'updated_user_id', 'id');
    }

    public function ElementsCreated()
    {
        return $this->hasMany('App\Entities\Element', 'created_user_id', 'id');
    }

    public function ElementsUpdated()
    {
        return $this->hasMany('App\Entities\Element', 'updated_user_id', 'id');
    }

    public function ElementPropertiesCreated()
    {
        return $this->hasMany('App\Entities\ElementProperty', 'created_user_id', 'id');
    }

    public function ElementPropertiesUpdated()
    {
        return $this->hasMany('App\Entities\ElementProperty', 'updated_user_id', 'id');
    }

    public function ElementPropertyHistoryCreated()
    {
        return $this->hasMany('App\Entities\ElementPropertyHistory', 'created_user_id', 'id');
    }

    public function VocabulariesCreated()
    {
        return $this->hasMany('App\Entities\Vocabulary', 'created_user_id', 'id');
    }

    public function VocabulariesUpdated()
    {
        return $this->hasMany('App\Entities\Vocabulary', 'updated_user_id', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Vocabularies()
    {
        return $this->belongsToMany('App\Entities\Vocabulary', 'VocabularyHasUser')
            ->withPivot('is_maintainer_for',
                'is_registrar_for', 'is_admin_for', 'languages',
                'default_language', 'current_language')
            ->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ElementSets()
    {
        return $this->belongsToMany('App\Entities\ElementSet', 'SchemaHasUser')
            ->withPivot('is_maintainer_for',
                'is_registrar_for', 'is_admin_for', 'languages',
                'default_language', 'current_language')
            ->withTimestamps();
    }

    public function VocabularyVersionsCreated()
    {
        return $this->hasMany('App\Entities\ElementSetHasVersion', 'created_user_id', 'id');
    }

}
