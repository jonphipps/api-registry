<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\Status
 *
 * @property integer $id
 * @property integer $display_order
 * @property string $display_name
 * @property string $uri
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Profile[] $profiles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ProfileProperty[] $profileProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Collection[] $Collections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Concept[] $Concepts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptProperty[] $ConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementSet[] $ElementSets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Element[] $Elements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementProperty[] $ElementProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementPropertyHistory[] $ElementPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Vocabulary[] $Vocabularies
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Status whereDisplayOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Status whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Status whereUri($value)
 */
class Status extends Model
{
    protected $table = 'reg_status';

    protected $fillable = array('display_order', 'display_name', 'uri');


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "display_order" => "integer",
        "display_name" => "string",
        "uri" => "string"
    ];

    public static $rules = [

    ];

    public function profiles()
    {
        return $this->hasMany('App\Entities\Profile', 'status_id', 'id');
    }

    public function profileProperties()
    {
        return $this->hasMany('App\Entities\ProfileProperty', 'status_id', 'id');
    }

    public function Collections()
    {
        return $this->hasMany('App\Entities\Collection', 'status_id', 'id');
    }

    public function Concepts()
    {
        return $this->hasMany('App\Entities\Concept', 'status_id', 'id');
    }

    public function ConceptProperties()
    {
        return $this->hasMany('App\Entities\ConceptProperty', 'status_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'status_id', 'id');
    }

    public function ElementSets()
    {
        return $this->hasMany('App\Entities\ElementSet', 'status_id', 'id');
    }

    public function Elements()
    {
        return $this->hasMany('App\Entities\Element', 'status_id', 'id');
    }

    public function ElementProperties()
    {
        return $this->hasMany('App\Entities\ElementProperty', 'status_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Entities\ElementPropertyHistory', 'status_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Entities\Vocabulary', 'status_id', 'id');
    }

}
