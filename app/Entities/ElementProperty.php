<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * App\Entities\ElementProperty
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
 * @property-read \App\Entities\ProfileProperty $ProfileProperty
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \App\Entities\Element $Element
 * @property-read \App\Entities\Element $RelatedSchemaProperty
 * @property-read \App\Entities\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementPropertyHistory[] $ElementPropertyHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereProfilePropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereIsSchemaProperty($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereObject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereRelatedSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ElementProperty whereIsGenerated($value)
 */
class ElementProperty extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

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
        "updated_at" => "required|",
        "schema_property_id" => "required|",
        "profile_property_id" => "required|",
        "object" => "max:65535",
        "language" => "required|max:6",
        "is_generated" => "required|"
    ];

    public function ProfileProperty()
    {
        return $this->belongsTo('App\Entities\ProfileProperty', 'profile_property_id', 'id');
    }

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_user_id', 'id');
    }

    public function Element()
    {
        return $this->belongsTo('App\Entities\Element', 'schema_property_id', 'id');
    }

    public function RelatedSchemaProperty()
    {
        return $this->belongsTo('App\Entities\Element', 'related_schema_property_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Entities\Discuss', 'schema_property_element_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Entities\ElementPropertyHistory', 'schema_property_element_id', 'id');
    }

}
