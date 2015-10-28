<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileProperty extends Model
{
    use SoftDeletes;

    protected $table = 'profile_property';
    
	protected $dates = ['deleted_at'];


    protected $fillable = array('skos_id', 'deleted_at', 'skos_parent_id', 'name', 'label', 'definition', 'comment',
        'type', 'uri', 'language', 'note', 'display_order', 'export_order', 'picklist_order', 'examples', 'is_required',
        'is_reciprocal', 'is_singleton', 'is_in_picklist', 'is_in_export', 'is_in_class_picklist', 'is_in_property_picklist',
        'is_in_rdf', 'is_in_xsd', 'is_attribute', 'has_language', 'is_object_prop', 'is_in_form');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"skos_id" => "integer",
		"created_by" => "integer",
		"updated_by" => "integer",
		"deleted_by" => "integer",
		"profile_id" => "integer",
		"skos_parent_id" => "integer",
		"name" => "string",
		"label" => "string",
		"definition" => "string",
		"comment" => "string",
		"type" => "string",
		"uri" => "string",
		"status_id" => "integer",
		"language" => "string",
		"note" => "string",
		"display_order" => "integer",
		"export_order" => "integer",
		"picklist_order" => "integer",
		"examples" => "string",
		"is_required" => "boolean",
		"is_reciprocal" => "boolean",
		"is_singleton" => "boolean",
		"is_in_picklist" => "boolean",
		"is_in_export" => "boolean",
		"inverse_profile_property_id" => "integer",
		"is_in_class_picklist" => "boolean",
		"is_in_property_picklist" => "boolean",
		"is_in_rdf" => "boolean",
		"is_in_xsd" => "boolean",
		"is_attribute" => "boolean",
		"has_language" => "boolean",
		"is_object_prop" => "boolean",
		"is_in_form" => "boolean"
    ];

	public static $rules = [
	    
	];

    public function Profile()
    {
        return $this->belongsTo('App\Models\Profile', 'profile_id', 'id');
    }

    public function ProfilePropertyInverse()
    {
        return $this->belongsTo('App\Models\ProfileProperty', 'inverse_profile_property_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function UserDeletor()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }

    public function InverseProfileProperties()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'inverse_profile_property_id', 'id');
    }

    public function SkosProperties()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'skos_property_id', 'skos_id');
    }

    public function ElementProperties()
    {
        return $this->hasMany('App\Models\SchemaPropertyElement', 'profile_property_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'profile_property_id', 'id');
    }

}
