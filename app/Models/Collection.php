<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Collection
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
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\User $UserUpdater
 * @property-read \App\Models\Vocabulary $Vocabulary
 * @property-read \App\Models\Status $Status
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereLastUpdated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection wherePrefLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Collection whereStatusId($value)
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
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

}

