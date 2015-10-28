<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementProperty extends Model
{
    use SoftDeletes;

    protected $table = 'reg_schema_property_element';
    
	protected $dates = ['deleted_at'];


    protected $fillable = array('deleted_at', 'is_schema_property', 'object', 'language', 'is_generated');


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"created_user_id" => "integer",
		"updated_user_id" => "integer",
		"schema_property_id" => "integer",
		"profile_property_id" => "integer",
		"is_schema_property" => "boolean",
		"object" => "string",
		"related_schema_property_id" => "integer",
		"language" => "string",
		"status_id" => "integer",
		"is_generated" => "boolean"
    ];

	public static $rules = [
	    
	];

    public function profileProperty()
    {
        return $this->belongsTo('App\Models\ProfileProperty', 'profile_property_id', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
    }

    public function SchemaProperty()
    {
        return $this->belongsTo('App\Models\SchemaProperty', 'schema_property_id', 'id');
    }

    public function RelatedSchemaProperty()
    {
        return $this->belongsTo('App\Models\SchemaProperty', 'related_schema_property_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'schema_property_element_id', 'id');
    }

    public function History()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'schema_property_element_id', 'id');
    }

}
