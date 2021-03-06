<?php namespace App\Models;

/**
 * App\Models\SkosProperty
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $inverse_id id of the inverse property
 * @property string $name The name of the property
 * @property string $uri The URI of the property
 * @property string $object_type the type of the object for which this is the predicate
 * @property integer $display_order Display order of properties
 * @property integer $picklist_order
 * @property string $label The pretty label for the property
 * @property string $definition
 * @property string $comment
 * @property string $examples Link to example usage
 * @property boolean $is_required boolean -- id this value required
 * @property boolean $is_reciprocal boolean - subject and object must both have this property
 * @property boolean $is_singleton boolean -- is this property allowed to repeat for a concept
 * @property boolean $is_scheme boolean - is in conceptScheme domain
 * @property boolean $is_in_picklist boolean - is in the property picklist
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereInverseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereObjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereDisplayOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty wherePicklistOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereDefinition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereExamples($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereIsRequired($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereIsReciprocal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereIsSingleton($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereIsScheme($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SkosProperty whereIsInPicklist($value)
 */
class SkosProperty extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'reg_skos_property';

    public $timestamps = false;

    protected $fillable = array('parent_id', 'inverse_id', 'name', 'uri', 'object_type', 'display_order',
        'picklist_order', 'label', 'definition', 'comment', 'examples', 'is_required', 'is_reciprocal', 'is_singleton',
        'is_scheme', 'is_in_picklist');

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'skos_property_id', 'id');
    }

}

