<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ConceptProperty
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $last_updated
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property integer $concept_id
 * @property boolean $primary_pref_label
 * @property integer $skos_property_id
 * @property string $object
 * @property integer $scheme_id
 * @property integer $related_concept_id
 * @property string $language
 * @property integer $status_id
 * @property boolean $is_concept_property
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\Concept $Concept
 * @property-read \App\Models\ProfileProperty $ProfileProperty
 * @property-read \App\Models\Vocabulary $Vocabulary
 * @property-read \App\Models\Status $Status
 * @property-read \App\Models\Concept $RelatedConcept
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Concept[] $PrefLabelConcept
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $Discussions
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty wherePrimaryPrefLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereSkosPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereSchemeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereRelatedConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ConceptProperty whereIsConceptProperty($value)
 */
class ConceptProperty extends Model
{
    use SoftDeletes;

    protected $table = 'reg_concept_property';
    
	protected $dates = ['deleted_at', 'last_updated'];


    protected $fillable = array('deleted_at', 'last_updated', 'primary_pref_label', 'object', 'language',
        'is_concept_property');



    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"created_user_id" => "integer",
		"updated_user_id" => "integer",
		"concept_id" => "integer",
		"primary_pref_label" => "boolean",
		"skos_property_id" => "integer",
		"object" => "string",
		"scheme_id" => "integer",
		"related_concept_id" => "integer",
		"language" => "string",
		"status_id" => "integer",
		"is_concept_property" => "boolean"
    ];

	public static $rules = [
	    
	];


    /** ===============
     * Accessors
     * ================
     */

    public function getObjectAttribute($value)
    {
        //TODO: Check to make sure the data in the database needs to be decoded
        return utf8_decode($value);
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
    }

    public function Concept()
    {
        return $this->belongsTo('App\Models\Concept', 'concept_id', 'id');
    }

    public function ProfileProperty()
    {
        return $this->belongsTo('App\Models\ProfileProperty', 'skos_property_id', 'skos_id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'scheme_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function RelatedConcept()
    {
        return $this->belongsTo('App\Models\Concept', 'related_concept_id', 'id');
    }

    public function PrefLabelConcept()
    {
        return $this->hasMany('App\Models\Concept', 'pref_label_id', 'id');
    }

    public function ConceptPropertyHistories()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'concept_property_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'concept_property_id', 'id');
    }

}
