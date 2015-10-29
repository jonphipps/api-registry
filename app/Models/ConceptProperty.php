<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
