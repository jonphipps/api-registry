<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ElementProperty
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property integer $schema_property_id
 * @property integer $profile_property_id
 * @property boolean $is_schema_property
 * @property string $object
 * @property integer $related_schema_property_id
 * @property string $language
 * @property integer $status_id
 * @property boolean $is_generated
 * @property-read \App\Models\ProfileProperty $ProfileProperty
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\Element $Element
 * @property-read \App\Models\Element $RelatedSchemaProperty
 * @property-read \App\Models\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $ElementPropertyHistories
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereProfilePropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereIsSchemaProperty($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereRelatedSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ElementProperty whereIsGenerated($value)
 */
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

    public function ProfileProperty()
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

    public function Element()
    {
        return $this->belongsTo('App\Models\Element', 'schema_property_id', 'id');
    }

    public function RelatedSchemaProperty()
    {
        return $this->belongsTo('App\Models\Element', 'related_schema_property_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'schema_property_element_id', 'id');
    }

    public function ElementPropertyHistories()
    {
        return $this->hasMany('App\Models\ElementPropertyHistory', 'schema_property_element_id', 'id');
    }

}
