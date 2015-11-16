<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\ConceptPropertyHistory
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property string $action
 * @property integer $concept_property_id
 * @property integer $concept_id
 * @property integer $vocabulary_id
 * @property integer $skos_property_id
 * @property string $object
 * @property integer $scheme_id id of the related vocabulary when required
 * @property integer $related_concept_id id of the related concept when required
 * @property string $language This will be an RFC3066 language code, which means it can be en, eng, en-us, or eng-us -- iso639-1 (2-char codes), iso639-2 (3-char codes), and combined with iso3166 (2-char country codes)
 * @property integer $status_id
 * @property integer $created_user_id The ID of the user that created the property
 * @property string $change_note
 * @property integer $import_id
 * @property-read \App\Entities\SkosProperty $SkosProperty
 * @property-read \App\Entities\FileImportHistory $FileImportHistory
 * @property-read \App\Entities\Vocabulary $ObjectScheme
 * @property-read \App\Entities\Status $Status
 * @property-read \App\Entities\Concept $ObjectConcept
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\ConceptProperty $ConceptProperty
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @property-read \App\Entities\Concept $Concept
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereConceptPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereSkosPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereSchemeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereRelatedConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereChangeNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ConceptPropertyHistory whereImportId($value)
 */
class ConceptPropertyHistory extends Model
{
    protected $table = 'reg_concept_property_history';
    
    protected $fillable = array('action', 'object', 'language', 'change_note');


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"action" => "string",
		"concept_property_id" => "integer",
		"concept_id" => "integer",
		"vocabulary_id" => "integer",
		"skos_property_id" => "integer",
		"object" => "string",
		"scheme_id" => "integer",
		"related_concept_id" => "integer",
		"language" => "string",
		"status_id" => "integer",
		"created_user_id" => "integer",
		"change_note" => "string",
		"import_id" => "integer"
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

    public function SkosProperty()
    {
        return $this->belongsTo('App\Entities\SkosProperty', 'skos_property_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->belongsTo('App\Entities\FileImportHistory', 'import_id', 'id');
    }

    public function ObjectScheme()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'scheme_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function ObjectConcept()
    {
        return $this->belongsTo('App\Entities\Concept', 'related_concept_id', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function ConceptProperty()
    {
        return $this->belongsTo('App\Entities\ConceptProperty', 'concept_property_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Concept()
    {
        return $this->belongsTo('App\Entities\Concept', 'concept_id', 'id');
    }

}
