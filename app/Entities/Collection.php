<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class Collection extends Model
{
    protected $table = 'reg_collection';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at', 'last_updated');
    }

    protected $fillable = array('deleted_at', 'last_updated', 'name', 'uri', 'pref_label');

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

