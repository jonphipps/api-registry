<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Concept
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
 * @property-read \App\Models\Vocabulary $Vocabulary
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\ConceptProperty $PrefLabelConceptProperty
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $ConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $RelatedConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $RelatedConceptPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $Discussions
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept wherePrefLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereIsTopConcept($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept wherePrefLabelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Concept whereLanguage($value)
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
