<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\ElementPropertyHistory
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
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\ElementProperty $ElementProperty
 * @property-read \App\Entities\Element $Element
 * @property-read \App\Entities\ElementSet $ElementSet
 * @property-read \App\Entities\Element $RelatedElement
 * @property-read \App\Entities\Status $Status
 * @property-read \App\Entities\ProfileProperty $ProfileProperty
 * @property-read \App\Entities\FileImportHistory $FileImportHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereSchemaPropertyElementId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereProfilePropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereRelatedSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereChangeNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementPropertyHistory whereImportId($value)
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
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function ElementProperty()
    {
        return $this->belongsTo('App\Entities\ElementProperty', 'schema_property_element_id', 'id');
    }

    public function Element()
    {
        return $this->belongsTo('App\Entities\Element', 'schema_property_id', 'id');
    }

    public function ElementSet()
    {
        return $this->belongsTo('App\Entities\ElementSet', 'schema_id', 'id');
    }

    public function RelatedElement()
    {
        return $this->belongsTo('App\Entities\Element', 'related_schema_property_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function ProfileProperty()
    {
        return $this->belongsTo('App\Entities\ProfileProperty', 'profile_property_id', 'id');
    }

    public function FileImportHistory()
    {
        return $this->belongsTo('App\Entities\FileImportHistory', 'import_id', 'id');
    }

}
