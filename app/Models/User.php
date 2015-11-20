<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\User
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile[] $ProfilesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile[] $ProfilesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile[] $ProfilesDeleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProfileProperty[] $ProfilePropertiesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProfileProperty[] $ProfilePropertiesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProfileProperty[] $ProfilePropertiesDeleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Agent[] $Agents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Collection[] $CollectionsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Collection[] $CollectionsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Concept[] $ConceptsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Concept[] $ConceptsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $ConceptPropertiesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $ConceptPropertiesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistoryCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $DiscussionsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $DiscussionsDeleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileImportHistory[] $FileImportHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSet[] $ElementSetsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSet[] $ElementSetsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Element[] $ElementsCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Element[] $ElementsUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementProperty[] $ElementPropertiesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementProperty[] $ElementPropertiesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $ElementPropertyHistoriesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vocabulary[] $VocabulariesCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vocabulary[] $VocabulariesUpdated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vocabulary[] $Vocabularies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSet[] $ElementSets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSetHasVersion[] $VocabularyVersionsCreated
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSalutation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSha1Password($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSalt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereWantToBeModerator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereIsModerator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereIsAdministrator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereDeletions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCulture($value)
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

    ];

    public function ProfilesUpdated()
    {
        return $this->hasMany('App\Models\Profile', 'updated_by', 'id');
    }

    public function ProfilesCreated()
    {
        return $this->hasMany('App\Models\Profile', 'created_by', 'id');
    }

    public function ProfilesDeleted()
    {
        return $this->hasMany('App\Models\Profile', 'deleted_by', 'id');
    }

    public function ProfilePropertiesUpdated()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'updated_by', 'id');
    }

    public function ProfilePropertiesCreated()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'created_by', 'id');
    }

    public function ProfilePropertiesDeleted()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'deleted_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Agents()
    {
        return $this->belongsToMany('App\Models\Agent', 'AgentHasUser')
            ->withPivot('is_registrar_for', 'is_admin_for')
            ->withTimestamps();
    }

    public function CollectionsCreated()
    {
        return $this->hasMany('App\Models\Collection', 'created_user_id', 'id');
    }

    public function CollectionsUpdated()
    {
        return $this->hasMany('App\Models\Collection', 'updated_user_id', 'id');
    }

    public function ConceptsCreated()
    {
        return $this->hasMany('App\Models\Concept', 'created_user_id', 'id');
    }

    public function ConceptsUpdated()
    {
        return $this->hasMany('App\Models\Concept', 'updated_user_id', 'id');
    }

    public function ConceptPropertiesCreated()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'created_user_id', 'id');
    }

    public function ConceptPropertiesUpdated()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'updated_user_id', 'id');
    }

    public function ConceptPropertyHistoryCreated()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'created_user_id', 'id');
    }

    public function DiscussionsCreated()
    {
        return $this->hasMany('App\Models\Discuss', 'created_user_id', 'id');
    }

    public function DiscussionsDeleted()
    {
        return $this->hasMany('App\Models\Discuss', 'deleted_user_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->hasMany('App\Models\FileImportHistory', 'user_id', 'id');
    }

    public function ElementSetsCreated()
    {
        return $this->hasMany('App\Models\ElementSet', 'created_user_id', 'id');
    }

    public function ElementSetsUpdated()
    {
        return $this->hasMany('App\Models\ElementSet', 'updated_user_id', 'id');
    }

    public function ElementsCreated()
    {
        return $this->hasMany('App\Models\Element', 'created_user_id', 'id');
    }

    public function ElementsUpdated()
    {
        return $this->hasMany('App\Models\Element', 'updated_user_id', 'id');
    }

    public function ElementPropertiesCreated()
    {
        return $this->hasMany('App\Models\ElementProperty', 'created_user_id', 'id');
    }

    public function ElementPropertiesUpdated()
    {
        return $this->hasMany('App\Models\ElementProperty', 'updated_user_id', 'id');
    }

    public function ElementPropertyHistoriesCreated()
    {
        return $this->hasMany('App\Models\ElementPropertyHistory', 'created_user_id', 'id');
    }

    public function VocabulariesCreated()
    {
        return $this->hasMany('App\Models\Vocabulary', 'created_user_id', 'id');
    }

    public function VocabulariesUpdated()
    {
        return $this->hasMany('App\Models\Vocabulary', 'updated_user_id', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Vocabularies()
    {
        return $this->belongsToMany('App\Models\Vocabulary', 'VocabularyHasUser')
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
        return $this->belongsToMany('App\Models\ElementSet', 'SchemaHasUser')
            ->withPivot('is_maintainer_for',
                'is_registrar_for', 'is_admin_for', 'languages',
                'default_language', 'current_language')
            ->withTimestamps();
    }

    public function VocabularyVersionsCreated()
    {
        return $this->hasMany('App\Models\ElementSetHasVersion', 'created_user_id', 'id');
    }

}
