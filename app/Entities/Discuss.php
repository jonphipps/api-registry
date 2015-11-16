<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
class Discuss extends Model
{
    protected $table = 'reg_discuss';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at');
    }

    protected $fillable = array('deleted_at', 'uri', 'subject', 'content');

    public function UserCreayed()
    {
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

