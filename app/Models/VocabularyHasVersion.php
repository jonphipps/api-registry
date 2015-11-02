<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\VocabularyHasVersion
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property \Carbon\Carbon $deleted_at
 * @property string $updated_at
 * @property integer $created_user_id
 * @property integer $vocabulary_id
 * @property \Carbon\Carbon $timeslice
 * @property-read \App\Models\User $UserCreator
 * @property-read \App\Models\Vocabulary $Vocabulary
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasVersion whereTimeslice($value)
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
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

}

