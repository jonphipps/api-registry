<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function SkosProperty()
    {
        return $this->belongsTo('App\Models\SkosProperty', 'skos_property_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->belongsTo('App\Models\FileImportHistory', 'import_id', 'id');
    }

    public function ObjectScheme()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'scheme_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function ObjectConcept()
    {
        return $this->belongsTo('App\Models\Concept', 'related_concept_id', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function ConceptProperty()
    {
        return $this->belongsTo('App\Models\ConceptProperty', 'concept_property_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Concept()
    {
        return $this->belongsTo('App\Models\Concept', 'concept_id', 'id');
    }

}
