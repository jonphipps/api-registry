<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\Concept
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $last_updated
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property string $uri
 * @property string $pref_label
 * @property integer $vocabulary_id
 * @property boolean $is_top_concept
 * @property integer $pref_label_id
 * @property integer $status_id
 * @property string $language
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\ConceptProperty $PrefLabelConceptProperty
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \App\Entities\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptProperty[] $ConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptProperty[] $RelatedConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $RelatedConceptPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $Discussions
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept wherePrefLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereIsTopConcept($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept wherePrefLabelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Concept whereLanguage($value)
 */
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
	    "updated_at" => "required|",
		"uri" => "required|max:255",
		"pref_label" => "required|max:255",
		"status_id" => "required|",
		"language" => "required|max:6"
	];

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function PrefLabelProperty()
    {
        return $this->belongsTo('App\Entities\ConceptProperty', 'pref_label_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_user_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function Properties()
    {
        return $this->hasMany('App\Entities\ConceptProperty', 'concept_id', 'id');
    }

    public function RelatedProperties()
    {
        return $this->hasMany('App\Entities\ConceptProperty', 'related_concept_id', 'id');
    }

    public function RelatedPropertyHistory()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'related_concept_id', 'id');
    }

    public function History()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'concept_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Entities\Discuss', 'concept_id', 'id');
    }

}
