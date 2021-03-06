<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Element
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property integer $schema_id
 * @property string $name
 * @property string $label
 * @property string $definition
 * @property string $comment
 * @property string $type
 * @property integer $is_subproperty_of
 * @property string $parent_uri
 * @property string $uri
 * @property integer $status_id
 * @property string $language
 * @property string $note
 * @property string $domain
 * @property string $orange
 * @property boolean $is_deprecated Boolean. Has this class/property been deprecated
 * @property string $url
 * @property string $lexical_alias
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\ElementSet $ElementSet
 * @property-read \App\Models\Element $ParentElement
 * @property-read \App\Models\Status $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discuss[] $Discussions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementProperty[] $ElementProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementProperty[] $RelatedElementProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $ElementPropertyHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $RelatedElementPropertyHistories
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereDefinition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereIsSubpropertyOf($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereParentUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereDomain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereOrange($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereIsDeprecated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Element whereLexicalAlias($value)
 */
class Element extends Model
{
    use SoftDeletes;

    protected $table = 'reg_schema_property';
    
    protected $dates = ['deleted_at'];


    protected $fillable = array('deleted_at', 'name', 'label', 'definition', 'comment', 'type', 'parent_uri', 'uri',
        'language', 'note', 'domain', 'orange', 'is_deprecated', 'url', 'lexical_alias');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "created_user_id" => "integer",
        "updated_user_id" => "integer",
        "schema_id" => "integer",
        "name" => "string",
        "label" => "string",
        "definition" => "string",
        "comment" => "string",
        "type" => "string",
        "is_subproperty_of" => "integer",
        "parent_uri" => "string",
        "uri" => "string",
        "status_id" => "integer",
        "language" => "string",
        "note" => "string",
        "domain" => "string",
        "orange" => "string",
        "is_deprecated" => "boolean",
        "url" => "string",
        "lexical_alias" => "string"
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

    public function ElementSet()
    {
        return $this->belongsTo('App\Models\ElementSet', 'schema_id', 'id');
    }

    public function ParentElement()
    {
        return $this->belongsTo('App\Models\Element', 'is_subproperty_of', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'schema_property_id', 'id');
    }

    public function ElementProperties()
    {
        return $this->hasMany('App\Models\ElementProperty', 'schema_property_id', 'id');
    }

    public function RelatedElementProperties()
    {
        return $this->hasMany('App\Models\ElementProperty', 'related_schema_property_id', 'id');
    }

    public function ElementPropertyHistories()
    {
        return $this->hasMany('App\Models\ElementPropertyHistory', 'schema_property_id', 'id');
    }

    public function RelatedElementPropertyHistories()
    {
        return $this->hasMany('App\Models\ElementPropertyHistory', 'related_schema_property_id', 'id');
    }

}
