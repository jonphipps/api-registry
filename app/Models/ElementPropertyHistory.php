<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ElementPropertyHistory
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property integer $created_user_id
 * @property string $action
 * @property integer $schema_property_element_id
 * @property integer $schema_property_id
 * @property integer $schema_id
 * @property integer $profile_property_id
 * @property string $object
 * @property integer $related_schema_property_id
 * @property string $language
 * @property integer $status_id
 * @property string $change_note
 * @property integer $import_id
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\SchemaPropertyElement $SchemaPropertyElement
 * @property-read \App\Models\SchemaProperty $SchemaProperty
 * @property-read \App\Models\Schema $Schema
 * @property-read \App\Models\SchemaProperty $RelatedSchemaProperty
 * @property-read \App\Models\Status $Status
 * @property-read \App\Models\ProfileProperty $profileProperty
 * @property-read \App\Models\FileImportHistory $FileImportHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereSchemaPropertyElementId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereProfilePropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereRelatedSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereChangeNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementPropertyHistory whereImportId($value)
 */
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
