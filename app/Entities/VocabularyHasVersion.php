<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\VocabularyHasVersion
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property \Carbon\Carbon $deleted_at
 * @property string $updated_at
 * @property integer $created_user_id
 * @property integer $vocabulary_id
 * @property \Carbon\Carbon $timeslice
 * @property-read \App\Entities\User $UserCreator
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasVersion whereTimeslice($value)
 */
class VocabularyHasVersion extends Model
{
    protected $table = 'reg_vocabulary_has_version';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at', 'timeslice');
    }

    protected $fillable = array('name', 'deleted_at', 'timeslice');

    public function UserCreator()
    {
        return $this->belongsTo('App\Entities\User', 'created_user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

}

