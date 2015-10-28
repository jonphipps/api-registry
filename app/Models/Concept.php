<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concept extends Model
{
    protected $table = 'reg_concept';

    use SoftDeletes;

	protected $dates = ['deleted_at', 'last_updated'];


    protected $fillable = array('deleted_at', 'last_updated', 'uri', 'pref_label', 'is_top_concept', 'language');


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"created_user_id" => "integer",
		"updated_user_id" => "integer",
		"uri" => "string",
		"pref_label" => "string",
		"vocabulary_id" => "integer",
		"is_top_concept" => "boolean",
		"pref_label_id" => "integer",
		"status_id" => "integer",
		"language" => "string"
    ];

	public static $rules = [
	    
	];

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function PrefLabelConceptProperty()
    {
        return $this->belongsTo('App\Models\ConceptProperty', 'pref_label_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function ConceptProperties()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'concept_id', 'id');
    }

    public function RelatedConceptProperties()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'related_concept_id', 'id');
    }

    public function RelatedConceptPropertyHistories()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'related_concept_id', 'id');
    }

    public function ConceptPropertyHistories()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'concept_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'concept_id', 'id');
    }

}
