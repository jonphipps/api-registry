<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Status
 *
 * @property integer $id
 * @property integer $display_order
 * @property string $display_name
 * @property string $uri
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile[] $profiles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProfileProperty[] $profileProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Collection[] $Collections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Concept[] $Concepts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptProperty[] $ConceptProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConceptPropertyHistory[] $ConceptPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementSet[] $ElementSets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Element[] $Elements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementProperty[] $ElementProperties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElementPropertyHistory[] $ElementPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vocabulary[] $Vocabularies
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Status whereDisplayOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Status whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Status whereUri($value)
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
        return $this->hasMany('App\Models\Profile', 'status_id', 'id');
    }

    public function profileProperties()
    {
        return $this->hasMany('App\Models\ProfileProperty', 'status_id', 'id');
    }

    public function Collections()
    {
        return $this->hasMany('App\Models\Collection', 'status_id', 'id');
    }

    public function Concepts()
    {
        return $this->hasMany('App\Models\Concept', 'status_id', 'id');
    }

    public function ConceptProperties()
    {
        return $this->hasMany('App\Models\ConceptProperty', 'status_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'status_id', 'id');
    }

    public function ElementSets()
    {
        return $this->hasMany('App\Models\ElementSet', 'status_id', 'id');
    }

    public function Elements()
    {
        return $this->hasMany('App\Models\Element', 'status_id', 'id');
    }

    public function ElementProperties()
    {
        return $this->hasMany('App\Models\ElementProperty', 'status_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Models\ElementPropertyHistory', 'status_id', 'id');
    }

    public function Vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary', 'status_id', 'id');
    }

}
