<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProfileProperty
 *
 * @property integer $id
 * @property integer $skos_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property integer $profile_id
 * @property integer $skos_parent_id
 * @property string $name
 * @property string $label
 * @property string $definition
 * @property string $comment
 * @property string $type
 * @property string $uri
 * @property integer $status_id
 * @property string $language
 * @property string $note
 * @property integer $display_order Display order of properties
 * @property integer $export_order Display order of properties
 * @property integer $picklist_order
 * @property string $examples Link to example usage
 * @property boolean $is_required boolean -- id this value required
 * @property boolean $is_reciprocal boolean - subject and object must both have this property
 * @property boolean $is_singleton boolean -- is this property allowed to repeat for a concept
 * @property boolean $is_in_picklist boolean - is in the property picklist
 * @property boolean $is_in_export
 * @property integer $inverse_profile_property_id id of the inverse property
 * @property boolean $is_in_class_picklist boolean - is in the property picklist
 * @property boolean $is_in_property_picklist boolean - is in the property picklist
 * @property boolean $is_in_rdf boolean - should this display in the RDF
 * @property boolean $is_in_xsd boolean - should this display in the XSD
 * @property boolean $is_attribute boolean - is this an attribute? attribute's aren't editable outside the main form
 * @property boolean $has_language Boolean that determines whether language attribute is displayed for this property
 * @property boolean $is_object_prop
 * @property boolean $is_in_form
 * @property-read \App\Models\Profile $Profile
 * @property-read \App\Models\ProfileProperty $ProfilePropertyInverse
 * @property-read \App\Models\Status $Status
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserDeletor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProfileProperty[] $InverseProfileProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $SkosProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementProperty[] $ElementProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $ElementPropertyHistories
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereSkosId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereProfileId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereSkosParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereDefinition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereDisplayOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereExportOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty wherePicklistOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereExamples($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsRequired($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsReciprocal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsSingleton($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInPicklist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInExport($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereInverseProfilePropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInClassPicklist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInPropertyPicklist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInRdf($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInXsd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsAttribute($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereHasLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsObjectProp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProfileProperty whereIsInForm($value)
 */
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

    public function getNameAttribute($value)
    {
        //this is necessary to use the legacy database, where range was at one time a reserved word
        if ('orange' == $value) {
            return 'range';
        } else {
            return $value;
        }
    }

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
        return $this->hasMany('App\Models\ElementProperty', 'profile_property_id', 'id');
    }

    public function ElementPropertyHistories()
    {
        return $this->hasMany('App\Models\ElementPropertyHistory', 'profile_property_id', 'id');
    }

}
