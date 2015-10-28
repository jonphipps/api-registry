<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    protected $table = 'reg_status';

    protected $fillable = array('display_order', 'display_name', 'uri');


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"display_order" => "integer",
		"display_name" => "string",
		"uri" => "string"
    ];

	public static $rules = [
	    
	];

    public function profiles()
    {
        return $this->hasMany('App\Models\Profile', 'status_id', 'id');
    }

    public function profileProperties()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'status_id', 'id');
    }

    public function Collections()
    {
        return $this->hasMany('App\Models\Collection', 'status_id', 'id');
    }

    public function Concepts()
    {
        return $this->hasMany('App\Models\Concept', 'status_id', 'id');
    }

    public function ConceptProperties()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'status_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'status_id', 'id');
    }

    public function ElementSets()
    {
        return $this->hasMany('App\Models\Schema', 'status_id', 'id');
    }

    public function Elements()
    {
        return $this->hasMany('App\Models\SchemaProperty', 'status_id', 'id');
    }

    public function ElementProperties()
    {
        return $this->hasMany('App\Models\SchemaPropertyElement', 'status_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'status_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary', 'status_id', 'id');
    }

}
