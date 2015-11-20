<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\Discuss
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_user_id
 * @property integer $deleted_user_id
 * @property string $uri
 * @property integer $schema_id
 * @property integer $schema_property_id
 * @property integer $schema_property_element_id
 * @property integer $vocabulary_id
 * @property integer $concept_id
 * @property integer $concept_property_id
 * @property integer $root_id
 * @property integer $parent_id
 * @property string $subject
 * @property string $content
 * @property-read \App\Entities\User $UserCreayed
 * @property-read \App\Entities\ConceptProperty $ConceptProperty
 * @property-read \App\Entities\User $UserDeletor
 * @property-read \App\Entities\ElementSet $ElementSet
 * @property-read \App\Entities\Element $Element
 * @property-read \App\Entities\ElementProperty $ElementProperty
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @property-read \App\Entities\Concept $Concept
 * @property-read \App\Entities\Discuss $DiscussRoot
 * @property-read \App\Entities\Discuss $DiscussParent
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereDeletedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereSchemaPropertyElementId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereConceptPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereRootId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Discuss whereContent($value)
 */
class Discuss extends Model implements Transformable
{
    protected $table = 'reg_discuss';

    use SoftDeletes;
    use TransformableTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "id",
        "created_at",
        "updated_at",
        "deleted_at",
        "created_user_id",
        "deleted_user_id",
        "uri",
        "schema_id",
        "schema_property_id",
        "schema_property_element_id",
        "vocabulary_id",
        "concept_id",
        "concept_property_id",
        "root_id",
        "parent_id",
        "subject",
        "content"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "created_user_id" => "integer",
        "deleted_user_id" => "integer",
        "uri" => "string",
        "schema_id" => "integer",
        "schema_property_id" => "integer",
        "schema_property_element_id" => "integer",
        "vocabulary_id" => "integer",
        "concept_id" => "integer",
        "concept_property_id" => "integer",
        "root_id" => "integer",
        "parent_id" => "integer",
        "subject" => "string",
        "content" => "string"
    ];

    public static $rules = [
        "uri" => "max:255",
        "subject" => "max:255",
        "content" => "max:65535"
    ];

        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function ConceptProperty()
    {
        return $this->belongsTo('App\Entities\ConceptProperty', 'concept_property_id', 'id');
    }

    public function UserDeletor()
    {
        return $this->belongsTo('App\Entities\User', 'deleted_user_id', 'id');
    }

    public function ElementSet()
    {
        return $this->belongsTo('App\Entities\ElementSet', 'schema_id', 'id');
    }

    public function Element()
    {
        return $this->belongsTo('App\Entities\Element', 'schema_property_id', 'id');
    }

    public function ElementProperty()
    {
        return $this->belongsTo('App\Entities\ElementProperty', 'schema_property_element_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Concept()
    {
        return $this->belongsTo('App\Entities\Concept', 'concept_id', 'id');
    }

    public function DiscussRoot()
    {
        return $this->belongsTo('App\Entities\Discuss', 'root_id', 'id');
    }

    public function DiscussParent()
    {
        return $this->belongsTo('App\Entities\Discuss', 'parent_id', 'id');
    }

}

