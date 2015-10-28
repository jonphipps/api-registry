<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementPropertyHistory extends Model
{

    protected $table = 'reg_schema_property_element_history';

    protected $fillable = array('action', 'object', 'language', 'change_note');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"created_user_id" => "integer",
		"action" => "string",
		"schema_property_element_id" => "integer",
		"schema_property_id" => "integer",
		"schema_id" => "integer",
		"profile_property_id" => "integer",
		"object" => "string",
		"related_schema_property_id" => "integer",
		"language" => "string",
		"status_id" => "integer",
		"change_note" => "string",
		"import_id" => "integer"
    ];

	public static $rules = [
	    
	];

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function SchemaPropertyElement()
    {
        return $this->belongsTo('App\Models\SchemaPropertyElement', 'schema_property_element_id', 'id');
    }

    public function SchemaProperty()
    {
        return $this->belongsTo('App\Models\SchemaProperty', 'schema_property_id', 'id');
    }

    public function Schema()
    {
        return $this->belongsTo('App\Models\Schema', 'schema_id', 'id');
    }

    public function RelatedSchemaProperty()
    {
        return $this->belongsTo('App\Models\SchemaProperty', 'related_schema_property_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function profileProperty()
    {
        return $this->belongsTo('App\Models\ProfileProperty', 'profile_property_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->belongsTo('App\Models\FileImportHistory', 'import_id', 'id');
    }

}
