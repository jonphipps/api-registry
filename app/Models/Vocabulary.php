<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function profile()
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
