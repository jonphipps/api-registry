<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * App\Entities\Collection
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $last_updated
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property integer $vocabulary_id
 * @property string $name
 * @property string $uri
 * @property string $pref_label
 * @property integer $status_id
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\User $UserUpdater
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @property-read \App\Entities\Status $Status
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection wherePrefLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereStatusId($value)
 */
class Collection extends Model implements Transformable
{
    protected $table = 'reg_collection';

    use SoftDeletes;
    use TransformableTrait;

    public function getDates()
    {
        return array('deleted_at', 'last_updated');
    }

    protected $fillable = array('deleted_at', 'last_updated', 'name', 'uri', 'pref_label');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "created_user_id" => "integer",
        "updated_user_id" => "integer",
        "vocabulary_id" => "integer",
        "name" => "string",
        "uri" => "string",
        "pref_label" => "string",
        "status_id" => "integer"
    ];

    public static $rules = [
        "name" => "required|max:255",
        "uri" => "max:255",
        "pref_label" => "required|max:255",
        "status_id" => "required|"
    ];

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Entities\User', 'updated_user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Entities\Status', 'status_id', 'id');
    }

}

