<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Discuss
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
 * @property-read \App\Models\User $UserCreayed
 * @property-read \App\Models\ConceptProperty $ConceptProperty
 * @property-read \App\Models\User $UserDeletor
 * @property-read \App\Models\ElementSet $ElementSet
 * @property-read \App\Models\Element $Element
 * @property-read \App\Models\ElementProperty $ElementProperty
 * @property-read \App\Models\Vocabulary $Vocabulary
 * @property-read \App\Models\Concept $Concept
 * @property-read \App\Models\Discuss $DiscussRoot
 * @property-read \App\Models\Discuss $DiscussParent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereDeletedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereSchemaPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereSchemaPropertyElementId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereConceptId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereConceptPropertyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereRootId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Discuss whereContent($value)
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
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function ConceptProperty()
    {
        return $this->belongsTo('App\Models\ConceptProperty', 'concept_property_id', 'id');
    }

    public function UserDeletor()
    {
        return $this->belongsTo('App\Models\User', 'deleted_user_id', 'id');
    }

    public function ElementSet()
    {
        return $this->belongsTo('App\Models\ElementSet', 'schema_id', 'id');
    }

    public function Element()
    {
        return $this->belongsTo('App\Models\Element', 'schema_property_id', 'id');
    }

    public function ElementProperty()
    {
        return $this->belongsTo('App\Models\ElementProperty', 'schema_property_element_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Concept()
    {
        return $this->belongsTo('App\Models\Concept', 'concept_id', 'id');
    }

    public function DiscussRoot()
    {
        return $this->belongsTo('App\Models\Discuss', 'root_id', 'id');
    }

    public function DiscussParent()
    {
        return $this->belongsTo('App\Models\Discuss', 'parent_id', 'id');
    }

}

