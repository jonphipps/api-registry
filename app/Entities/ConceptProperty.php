<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * App\Entities\ConceptProperty
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
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \App\Entities\Concept $Concept
 * @property-read \App\Entities\ProfileProperty $ProfileProperty
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @property-read \App\Entities\Status $Status
 * @property-read \App\Entities\Concept $RelatedConcept
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Concept[] $PrefLabelConcept
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $Discussions
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty wherePrimaryPrefLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereSkosPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereSchemeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereRelatedConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptProperty whereIsConceptProperty($value)
 */
class ConceptProperty extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

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
        "updated_at" => "required|",
        "concept_id" => "required|",
        "skos_property_id" => "required|",
        "object" => "max:65535",
        "language" => "max:6",
        "is_concept_property" => "required|"
    ];


    /** ===============
     * Accessors
     * ================
     */

//    public function getObjectAttribute($value)
//    {
//        //TODO: Check to make sure the data in the database needs to be decoded
//        return utf8_decode($value);
//    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_user_id', 'id');
    }

    public function Concept()
    {
        return $this->belongsTo('App\Entities\Concept', 'concept_id', 'id');
    }

    public function ProfileProperty()
    {
        return $this->belongsTo('App\Entities\ProfileProperty', 'skos_property_id', 'skos_id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'scheme_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function RelatedConcept()
    {
        return $this->belongsTo('App\Entities\Concept', 'related_concept_id', 'id');
    }

    public function PrefLabelConcept()
    {
        return $this->hasMany('App\Entities\Concept', 'pref_label_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'concept_property_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Entities\Discuss', 'concept_property_id', 'id');
    }

}
