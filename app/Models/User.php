<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany('App\Models\Schema', 'created_user_id', 'id');
    }

    public function ElementSetsUpdated()
    {
        return $this->hasMany('App\Models\Schema', 'updated_user_id', 'id');
    }

    public function ElementsCreated()
    {
        return $this->hasMany('App\Models\SchemaProperty', 'created_user_id', 'id');
    }

    public function ElementsUpdated()
    {
        return $this->hasMany('App\Models\SchemaProperty', 'updated_user_id', 'id');
    }

    public function ElementPropertiesCreated()
    {
        return $this->hasMany('App\Models\SchemaPropertyElement', 'created_user_id', 'id');
    }

    public function ElementPropertiesUpdated()
    {
        return $this->hasMany('App\Models\SchemaPropertyElement', 'updated_user_id', 'id');
    }

    public function ElementPropertyHistoriesCreated()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'created_user_id', 'id');
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
        return $this->belongsToMany('App\Models\Schema', 'SchemaHasUser')
            ->withPivot('is_maintainer_for',
                'is_registrar_for', 'is_admin_for', 'languages',
                'default_language', 'current_language')
            ->withTimestamps();
    }

    public function VocabularyVersionsCreated()
    {
        return $this->hasMany('App\Models\SchemaHasVersion', 'created_user_id', 'id');
    }

}
